<?php

namespace App\Http\Livewire\User;

use App\Models\Ongkir;
use App\Models\Pembayaran;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

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
        ]);
    }
}
