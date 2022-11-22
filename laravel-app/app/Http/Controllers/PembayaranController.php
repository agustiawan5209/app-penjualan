<?php

namespace App\Http\Controllers;

use Notification;
use Carbon\Carbon;
use App\Models\Promo;
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
    public function dataPotonganAll()
    {
        $data = session('keranjang');
        $potongan_promo_persen = $this->PotonganPromoPersen();
        $potongan_promo_nominal = $this->PotonganPromoNominal();
        $arr_persen = [$potongan_promo_persen];
        $arr_nominal = [$potongan_promo_nominal];
        $potongan_persen = $this->hitungPotonganPersen($arr_persen, $data['total_bayar']);
        $potongan_nominal = $this->hitungPotonganNominal($arr_nominal);
        return array_sum([$potongan_persen, $potongan_nominal, $data['potongan']]);
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
            'foto' => ['required', 'image', 'max:5000', 'mimes:png,jpg'],
            'nama' => 'required',
            'tgl_transaksi' => ['required', 'date'],
        ]);
        if ($request->metode == 1) {
            $request->validate([
                'kode_pos' => 'required',
                'detail_alamat' => 'required',
                'kabupaten' => 'required',
                'kecamatan' => 'required'
            ]);
        }
        if (session()->has('keranjang')) {
            $param = [
                'param' => session('keranjang'),
                'request' => $request,
                'file' => $this->uploadFile($request->foto),
            ];
            $transaksi_id = $this->transaksi_id();
            $pdf = Pdf::loadView('page.invoice.invoice', ['data' => session('keranjang'), 'request' => $request, 'file' => $this->uploadFile($request->foto), 'transaksi_id' => $transaksi_id, 'potongan' => $this->dataPotonganAll()])->setPaper('a4', 'landscape');
            $item_details = session('keranjang');
            $this->createPayment($request, $item_details['item'], $pdf->download()->getOriginalContent(), $transaksi_id);
            $this->createTransaksi($item_details['item'], $transaksi_id);
            Keranjang::where('user_id', '=', Auth::user()->id)->delete();
            $this->GantiStatusPromo();
            session()->forget('keranjang');

            Alert::success('Berhasil', "Pemesanan Barang Berhasil, Mohon Tunggu Konfirmasi");
            return redirect()->route('home');
        } else {
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
        $jenis_m =  session('keranjang')['jenis'];
        $random_name = $this->uploadFile($request->foto);
        // Cek Pemilik Barang
        $arr = [];
        $cart = Keranjang::where('user_id', '=', Auth::user()->id)->get();
        foreach ($cart as $item) {
            $arr[] = $item->barang->user_id;
        }

        if ($jenis_m == 'cart') {
            for ($i = 0; $i < count($item_details); $i++) {
                $item_param = [$item_details[$i]->barang->nama_barang, $item_details[$i]->barang->harga, $item_details[$i]->quantity, $item_details[$i]->sub_total];
                $exp = implode('/', $item_param);
            }
        } else {
            $item_param = [$item_details->nama_barang, $item_details->harga, $item_details->quantity, $item_details->sub_total];
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
            'nama' => $request->nama,
            'no_telpon' => $request->no_telpon,
            'total_price' => $request->sub_total,
            'payment_status' => '1',
            'payment_type' => 'BANK',
            'transaksi_id' => $ID_Transkasi,
            'pdf_url' => $namPDF,
            'tgl_transaksi' => Carbon::now()->format('Y-m-d'),
            'item_details' => $exp,
            'metode_pengiriman' => $request->metode,
        ]);
        Notification::send($payemnt, new InvoicePaid([
            'type' => 'payment',
            'body' => Auth::user()->name . " Baru Saja Melakukan Pembayaran",
            'from' => 'User=' . Auth::user()->id,
        ]));
        // $this->createOngkir($request, $ID_Transkasi);
        if ($request->metode == 1) {
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
        $harga = 0;
        if ($request->kabupaten == 'Kota Kendari' || $request->kabupaten == 'Kendari') {
            $harga = '12000';
        } else {
            $harga = '0';
        }
        Ongkir::create([
            'transaksi_id' => $ID_Transkasi,
            'tgl_pengiriman' => null,
            'harga' => $harga,
            'kode_pos' => $request->kode_pos,
            'kabupaten' => $request->kabupaten,
            'detail_alamat' => $request->detail_alamat,
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
        $jenis_m =  session('keranjang');


        if ($jenis_m['jenis'] == 'cart') {
            $count = count($item_details);
        } elseif ($jenis_m['jenis'] == 'beli') {
            $item_details = [$item_details];
            $count = count($item_details);
        }

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

            if ($jenis_m['jenis'] == 'cart') {
                $promo_persen = $cart->GetPromo($item_details[$i]['barang_id']);
                $promo_nominal = $cart->GetPromoNominal($item_details[$i]['barang_id']);
                $barang = Barang::with('diskon')
                    ->where('id', $item_details[$i]['barang_id'])
                    ->first();
            } else if ($jenis_m['jenis'] == 'beli') {
                $promo_persen = $cart->GetPromo($item_details[$i]['id']);
                $promo_nominal = $cart->GetPromoNominal($item_details[$i]['id']);
                $barang = Barang::with('diskon')
                    ->where('id', $item_details[$i]['id'])
                    ->first();
            }
            if ($jenis_m['jenis'] == 'cart') {
                $item_param = [
                    $item_details[$i]->barang->id,
                    $item_details[$i]->total_awal,
                    $item_details[$i]->quantity,
                    $item_details[$i]->sub_total,
                    '/'
                ];
            } else if ($jenis_m['jenis'] == 'beli') {
                $item_param = [
                    $item_details[$i]->id,
                    $item_details[$i]->harga,
                    '1',
                    $item_details[$i]->harga,
                    '/'
                ];
            }
            // Jika Potongan sama Dengan 0 atau null maka potongan sama dengan harga jika tidak maka harga akan dipotong
            // $potongan_nominal =  $promo_nominal ;
            // $potongan_persen = $item_details[$i]->sub_total * ((int) $promo_persen / 100);
            // dd($item_param);
            if ($barang->diskon != null) {
                foreach ($barang->diskon as $item) {
                    $potongan[] = $item->jumlah_diskon;
                }
            }
            if ($promo_nominal == 0) {
                $total_potongan =  $promo_persen - ($item_details[$i]->total_awal * (array_sum($potongan) / 100) );
            } else {
                $total_potongan =  $promo_nominal - ($item_details[$i]->total_awal * (array_sum($potongan) / 100) );

            }
            Transaksi::create([
                'ID_transaksi' => $transaksi_id,
                'tgl_transaksi' => Carbon::now()->format('Y-m-d'),
                'item_details' => implode(',', $item_param),
                'barang_id' => $jenis_m['jenis'] == 'beli' ? $item_details[$i]->id : $item_details[$i]->barang_id,
                'potongan' => $total_potongan,
                'total' => $item_details[$i]->sub_total - $total_potongan,
            ]);
            UsesUserVoucher::where('status', '=', '3')
                ->where('user_id', Auth::user()->id)
                ->update([
                    'status' => '4',
                ]);
            $user_promo = UsesUserPromo::where('user_id', Auth::user()->id)
                ->where('status', '=', '1')
                ->get();
            foreach ($user_promo as $item) {
                UsesUserPromo::find($item->id)
                    ->where('status', '=', '1')
                    ->update([
                        'status' => '0'
                    ]);
            }
            $user_promo = UsesUserPromo::where('user_id', Auth::user()->id)->get();
            foreach ($user_promo as $item) {
                UsesUserPromo::find($item->id)
                    ->where('status', '=', '1')
                    ->update([
                        'status' => '0'
                    ]);
            }
        }
        // Hapus Voucher Yang Memiliki Status 3

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
    public function PotonganPromoPersen()
    {
        $promoController  = new KeranjangController();
        return $promoController->GetPromo();
    }
    public function PotonganPromoNominal()
    {
        $promoController  = new KeranjangController();
        return $promoController->GetPromoNominal();
    }
    public function hitungPotonganPersen($data = [], $total)
    {
        $jumlah_persen = array_sum($data);
        $total_b = $total * ($jumlah_persen / 100);
        return abs($total_b);
    }
    public function hitungPotonganNominal($data = [])
    {
        $jumlah_nominal = array_sum($data);
        return $jumlah_nominal;
    }
    public function CekPromo()
    {
        // Alert::warning('11', '404');
        $this->cekKadaluarsaPromo();
        $cek_pengguna = false;
        // Mengecek Jumlah Maksimal user Pada Promo
        $max_user = Promo::where('kode_promo', '=', $this->kode_promo)->get();
        // dd($max_user);
        // Cek Max Pengguna User
        if ($max_user->count() > 0) {
            foreach ($max_user as $item) {
                $cek_pengguna_promo = UsesUserPromo::where('promo_id', '=', $item->id)->get();
                if ($cek_pengguna_promo->count() == $item->max_user) {
                    // Jika Pengguna Promo Sama Dengan Besar
                    $cek_pengguna = false;
                    Alert::info('message', 'Maaf Pengguna Promo Sudah Maksimal');
                } else if ($cek_pengguna_promo->count() < $item->max_user) {
                    // Jika Pengguna User Lebh Kecil
                    $cek_pengguna = true;
                }
            }
        } else {
            Alert::warning('Info', 'Kode Promo Salah');
        }
        // Cek Promo
        if ($cek_pengguna == true) {
            $promo = Promo::where('kode_promo', '=', $this->kode_promo)->first();
            if ($promo->count() > 0) {
                // Mencocokan Kode Promo
                $promo_user = UsesUserPromo::where('user_id', '=', Auth::user()->id)->where('status', '=', '1')->get();
                // Jika Gagal
                if ($promo_user->count() > 0) {
                    Alert::info('message', 'Maaf Promo Sudah Terpakai');
                } else {
                    // Jika Kode Promo Cocok Maka Menambahkan Ke promo User
                    $promo_user = UsesUserPromo::insert([
                        'user_id' => Auth::user()->id,
                        'promo_id' => $promo->id,
                        'status' => '0'
                    ]);
                    $get_promo = Promo::find($promo->id);
                    if ($get_promo->use_user == $get_promo->max_user) {
                        Alert::info('message', 'Maaf Kode Promo Salah');
                    } else {

                        $count = $get_promo->use_user + 1;
                        Promo::where('id', $promo->id)->update([
                            'use_user' => $count
                        ]);
                        Alert::info('message', 'Selamat Menikmati Promo Yang Ada');
                    }
                }
            } else {
                Alert::info('message', 'Maaf Kode Promo Salah');
            }
        }
    }
    public function cekKadaluarsaPromo()
    {
        // Mengambil Tanggal
        $carbon = Carbon::now()->format('Y-m-d');
        $array_cek = [];
        // mengambil data promo
        $tgl_promo = Promo::whereDate('tgl_kadaluarsa', '<=', $carbon)->get();
        if ($tgl_promo->count() > 0) {
            // foreach ($tgl_promo as $tgl_cek) {
            $promo_kadaluarsa = Promo::whereDate('tgl_kadaluarsa', $carbon)->get();
            foreach ($promo_kadaluarsa as $item) {
                if ($promo_kadaluarsa) {
                    $array_cek[] = 'Terhapus : ' . $item->id;
                    Promo::whereNull('deleted_at')->whereDate('tgl_kadaluarsa', $carbon)->delete();
                } else {
                    $array_cek[] = 'Tidak Terhapus : ' . $item->id;
                }
                // }
            }
        }
    }
}
