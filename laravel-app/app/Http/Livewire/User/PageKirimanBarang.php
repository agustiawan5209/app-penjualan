<?php

namespace App\Http\Livewire\User;

use App\Models\Ongkir;
use Livewire\Component;
use App\Models\Transaksi;
use App\Models\Pembayaran;
use App\Models\Pengembalian;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PageKirimanBarang extends Component
{
    public $search = "";
    public $row = 7;
    public $min_date , $max_date;
    public $ItemID, $statusItem = false;
    public $tgl_pengiriman, $harga, $kode_pos,$kabupaten,$detail_alamat,$status,$transaksi_id, $user_name,$item_details, $Ongkir_id;
    public $ongkirItem = false, $itemDetail = false, $konfirmasiItem = false;

    public function lihatStatus($id){
        $this->itemID = $id;
        $this->statusItem = true;
    }
    public function detailItem($id){
        $pembayaran = Pembayaran::find($id);

        return redirect()->route('detail-item-transaksi', ['idItem'=> $pembayaran->transaksi_id])->with('toast_success', 'Detail Pembayaran!');
    }
    public function render()
    {
        $terkirim = '';
        $diterima = '';
        $belum_konfirmasi = '';
        $belum_terkirim = '';
        $produk =  Pembayaran::where('user_id', '=', Auth::user()->id)->get();
        if($produk->count() > 0){
            foreach ($produk as $key => $value) {
                $belum_terkirim = ongkir::where('status', '!=', '5')
                    ->where('transaksi_id', '=', $value->transaksi_id)
                    ->orderBy('id', 'desc')
                    ->get();

                $terkirim = ongkir::where('status', '=', '2')->orWhere('status' ,'=', '3')
                    ->where('transaksi_id', '=', $value->transaksi_id)
                    ->orderBy('id', 'desc')
                    ->get();
                $diterima = ongkir::where('status', '=', '4')
                    ->where('transaksi_id', '=', $value->transaksi_id)
                    ->orderBy('id', 'desc')
                    ->get();
            }
        }
        // if($terkirim == null){
        //     $terkirim = "";
        // }
        // dd($belum_terkirim);
        $belum_konfirmasi = Pembayaran::where('user_id', '=', Auth::user()->id)
        ->where('payment_status', '=', '2')->orderBy('id', 'desc')
        ->get();
        return view('livewire.user.page-kiriman-barang',[
            'produk' => $produk,
            'terkirim' => $terkirim,
            'diterima' => $diterima,
            'belum_terkirim' => $belum_terkirim,
            'belum_konfirmasi'=> $belum_konfirmasi,
        ])->layout('livewire.layout.customer');
    }
    public function create()
    {
        $this->validate([
            'updatefoto' => ['required', 'image', 'max:2040'],
            'alasan' => ['required', 'string'],
            'kondisi' => ['required'],
            // 'status'=> ['required'],
        ]);

        $nama = $this->updatefoto->getClientOriginalName();
        $ext = $this->updatefoto->getClientOriginalExtension();
        $randomName = 'P-' . $nama;
        $this->updatefoto->storeAs('upload', $randomName);
        Pengembalian::create([
            'transaksi_id' => $this->itemID,
            'gambar' => $randomName,
            'alasan' => $this->alasan,
            'kondisi' => $this->kondisi,
            'kondisi_lain' => $this->kondisi_lain,
            'status' => '1',
        ]);
        Alert::info('Dalam Proses', 'Harap Menunggu Konfirmasi Dari Pemilik');
        $this->modalItem = false;
    }
}
