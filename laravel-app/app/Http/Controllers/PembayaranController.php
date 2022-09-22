<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Barang;
use App\Models\Ongkir;
use App\Models\Voucher;
use App\Models\Keranjang;
use App\Models\Transaksi;
use App\Models\Pembayaran;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Models\UsesUserPromo;
use App\Models\UsesUserVoucher;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Notifications\InvoicePaid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Notification;
use App\Http\Requests\StorePembayaranRequest;
use App\Http\Requests\UpdatePembayaranRequest;

class PembayaranController extends Controller
{
    /**
     * uploadFile
     * Mengupload Bukti Byar
     * @param  mixed $file
     * @return void
     */
    public function uploadFile($file)
    {
        // dd($file->getClientOriginalName());
        $nama = $file->getClientOriginalName();
        $random_name = md5($nama) . '.' . $file->getClientOriginalExtension();
        if (Storage::exists(public_path('bukti/' . $random_name))) {
            $random_name = md5($nama) . '.' . $file->getClientOriginalExtension();
        }
        $file->storeAs('bukti', $random_name);
        return $random_name;
    }

    /**
     * GantiStatusPromo
     * Mengganti Status Dari Promo Yang Tersedia
     * @return void
     */
    public function GantiStatusPromo()
    {
        UsesUserPromo::where('user_id', '=', Auth::user()->id)->update([
            'status' => '1',
        ]);
    }

    /**
     * receive
     * Melakukan Pengiriman data Ke Pembayaran
     * Dan
     * Melakukan Pemotongan Total
     * @param  mixed $request
     * @return void
     */
    public function receive(Request $request)
    {
        $validasi = $request->validate([
            // 'kabupaten' => 'required',
            // 'kode_pos' => 'required',
            'metode' => 'required',
            'sub_total' => 'required',
            'foto' => ['image', 'max:5000','mimes:png,jpg'],
            'nama' => 'required',
        ]);
        // dd(session('param'));
        if (session()->has('keranjang')) {
            $param = [
                'param' => session('keranjang'),
                'request' => $request,
                'file' => $this->uploadFile($request->foto),
            ];

            // dd($cek_file);
            $transaksi_id = $this->transaksi_id();
            $pdf = Pdf::loadView('page.invoice.invoice', ['data'=> session('keranjang'), 'request'=> $request, 'file' => $this->uploadFile($request->foto), 'transaksi_id'=> $transaksi_id])->setPaper('a4', 'landscape');
            $item_details = session('keranjang');
            $this->createPayment($request, $item_details['item'], $pdf->download()->getOriginalContent(), $transaksi_id);
            $this->createTransaksi($item_details['item'], $transaksi_id);
            Keranjang::where('user_id', '=', Auth::user()->id)->delete();
            session()->forget('param');
            $this->GantiStatusPromo();

            Alert::success('Berhasil', "Pemesanan Barang Berhasil, Mohon Tunggu Konfirmasi");
            return redirect()->route('home');
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * createPayment
     * Menginput Kedalam Tabel Pembayran
     * @param  mixed $request
     * @param  mixed $item_details
     * @param  mixed $pdf
     * @param  mixed $transaksi_id
     * @return void
     */
    public function createPayment($request, $item_details, $pdf, $transaksi_id)
    {
        $payment_status = '';
        $payment_type = '';
        // if ($request->foto == null && $request->metode == 'COD') {
        //     $payment_status = '';
        //     $payment_type = 'COD';
        // } else

        $random_name = $this->uploadFile($request->foto);
        // Cek Pemilik Barang
        $arr = [];
        $cart = Keranjang::where('user_id', '=', Auth::user()->id)->get();
        foreach ($cart as $item) {
            $arr[] = $item->barang->user_id;
        }

        for ($i = 0; $i < count($item_details); $i++) {
            $item_param = [$item_details[$i]->barang_id, $item_details[$i]->harga, $item_details[$i]->quantity, $item_details[$i]->sub_total];
            $exp = implode('/', $item_param);
        }
        $permitted_chars = '01234567891011223344556677889900_abcdefghijklmnopqrstuvwxyz_ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        // Generate Transaksi ID

        $ID_Transkasi = $transaksi_id;
        // Simpan PDF
        $namPDF = substr(str_shuffle($permitted_chars), 0, 7) . '.pdf';
        Storage::put('bukti/' . $namPDF, $pdf);

        $payemnt = Pembayaran::create([
            'user_id' => Auth::user()->id,
            'nama'=> $request->nama,
            'number' => Auth::user()->name . '_' . $this->generateUniqueNumber(),
            'total_price' => $request->sub_total,
            'payment_status' => '1',
            'payment_type' => 'BANK',
            'transaksi_id' => $ID_Transkasi,
            'pdf_url' => $namPDF,
            'tgl_transaksi' => Carbon::now()->format('Y-m-d'),
            'item_details' => $exp,
            'metode_pengiriman' => $request->metode,
        ]);
        Notification::send($payemnt,new InvoicePaid([
            'type'=> 'payment',
            'body'=> Auth::user()->name . " Baru Saja Melakukan Pembayaran",
            'from'=> 'User='. Auth::user()->id,
        ]));
        // $this->createOngkir($request, $ID_Transkasi);
        if($request->metode == 1){
            $this->createOngkir($request, $ID_Transkasi);
        }

    }

    /**
     * createOngkir
     * Membuat Ongkir
     * @param  mixed $request
     * @param  mixed $ID_Transkasi
     * @return void
     */
    public function createOngkir($request, $ID_Transkasi)
    {
        $status = 0;
        if ($request->kabupaten == 'Kota Makassar' || $request->kabupaten == 'Kabupaten Gowa') {
            $harga = 12000;
        } else {
            $harga = 0;
        }
        Ongkir::create([
            'transaksi_id' => $ID_Transkasi,
            'tgl_pengiriman' => null,
            'harga' => $harga,
            'kode_pos' => $request->kode_pos,
            'kabupaten' => $request->kabupaten,
            'detail_alamat' => $request->alamat,
            // 'status' => $status,
        ]);
    }

    /**
     * createTransaksi
     * Membuat Transaksi Dengan Jumlah Yang Sama Dengan Jumlah Item
     * @param  mixed $item_details
     * @param  mixed $transaksi_id
     * @return void
     */
    public function createTransaksi($item_details = [], $transaksi_id)
    {
        $count = count($item_details);
        $potongan_persen = 0;
        $potongan_nominal = 0;
        $potongan = [0];
        // dd($item_details[1]);
        // Ambil Nilai Promo Dari CartController
        $cart = new KeranjangController();
        // Ambil Promo Persen
        $promo_persen = $cart->GetPromo();
        // Ambil Promo Nominal
        $promo_nominal = $cart->GetPromoNominal();
        // Melakukan Generate Random Number Pada Field ID_transaksi

        // Melakukan Perulanagan Untuk Membuat Field Dalam Tabel Transaksi
        for ($i = 0; $i < $count; $i++) {
            // dd($item_details[$i]);
            // Hapus VOcuher =
            $v = Voucher::where('barang_id', '=', $item_details[$i]['barang_id'])->first();
            //   dd($v);
            if ($v != null) {
                UsesUserVoucher::where('voucher_id', $v->id)
                    ->where('user_id', Auth::user()->id)
                    ->update([
                        'status' => '2',
                    ]);
            }
            // end Vocuher
            $promo_persen = $cart->GetPromo($item_details[$i]['barang_id']);
            $promo_nominal = $cart->GetPromoNominal($item_details[$i]['barang_id']);
            $barang = Barang::with('diskon')
                ->where('id', $item_details[$i]['barang_id'])
                ->first();
            $item_param = [
               'barang_id'=> $item_details[$i]->barang_id,
               'total_awal'=> $item_details[$i]->total_awal,
               'jumlah'=> $item_details[$i]->quantity,
               'sub_total'=> $item_details[$i]->sub_total,
            ];
            // dd($item_details[$i]);
            // Jika Potongan sama Dengan 0 atau null maka potongan sama dengan harga jika tidak maka harga akan dipotong
            // $potongan_nominal =  $promo_nominal ;
            // $potongan_persen = $item_details[$i]->sub_total * ((int) $promo_persen / 100);
            // dd($barang->diskon->jumlah_diskon);
            if ($barang->diskon != null) {
                foreach ($barang->diskon as $item) {
                    $potongan[] = $item->jumlah_diskon;
                }
            }
            $total_potongan = $item_details[$i]->total_awal * (array_sum($potongan) / 100);

            Transaksi::create([
                'ID_transaksi' => $transaksi_id,
                'tgl_transaksi' => Carbon::now()->format('Y-m-d'),
                'item_details' => implode(',', $item_param),
                'barang_id' => $item_details[$i]->barang_id,
                'potongan' => $total_potongan,
                'total' => $item_details[$i]->sub_total - $total_potongan,
            ]);
        }
        // Hapus Voucher Yang Memiliki Status 3
        // UsesUserVoucher::where('status', '=', '3')->update([
        //     'status' => '4',
        // ]);
    }

    /**
     * transaksi_id
     * Membuat ID Transaksi
     * @return void
     */
    public function transaksi_id()
    {
        $permitted_chars = '01234567891011223344556677889900_abcdefghijklmnopqrstuvwxyz_ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        do {
            $transaksi_id = substr(str_shuffle($permitted_chars), 0, 8);
        } while (Pembayaran::where('transaksi_id', '=', $transaksi_id)->first());
        return $transaksi_id;
    }
    public function generateUniqueNumber()
    {
        $permitted_chars = '01234567891011223344556677889900_abcdefghijklmnopqrstuvwxyz_ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        do {
            $transaksi_id = substr(str_shuffle($permitted_chars), 0, 5);
        } while (Pembayaran::where('transaksi_id', '=', $transaksi_id)->first());
        return $transaksi_id;
    }
}
