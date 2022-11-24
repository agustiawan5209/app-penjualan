<?php

namespace App\Http\Livewire\User;

use App\Models\Keranjang;
use App\Models\Pembayaran;
use Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $jumlah_pesanan = Pembayaran::where('user_id', Auth::user()->id)->where('payment_status', '=', '2')->sum('total_price');
        $jumlah_pesanan_1 = Pembayaran::where('user_id', Auth::user()->id)->where('payment_status', '=', '1')->get();
        $Jumlah_barang_keranjang = Keranjang::where('user_id', Auth::user()->id)->get();
        return view('livewire.user.dashboard' ,[
            'jumlah_pesanan'=> $jumlah_pesanan,
            'Jumlah_barang_keranjang'=> $Jumlah_barang_keranjang,
            'jumlah_pesanan_1'=> $jumlah_pesanan_1
        ])->layout('livewire.layout.customer');
    }
}
