<?php

namespace App\Http\Livewire\Page;

use Cart;
use App\Models\Barang;
use App\Models\Keranjang;
use Auth;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;


class Produklist extends Component
{
    public function render()
    {
        $produk = Barang::all();
        // \Cart::remove(1);
        return view('livewire.page.produklist', [
            'produk' => $produk,
        ]);
    }
    public function addToCart($id)
    {
        // dd("hai");
        if (Auth::check()) {
            $userID = auth()->user()->id;
            $barang = Barang::find($id);
            if(1 <= 0){
                Alert::info('Stock Habis', 'Stock Tidak Cukup');
            }else{
              $cat = Keranjang::create([
                'user_id'=> $userID,
                'barang_id'=>$barang->id,
                'quantity'=> 1,
                'sub_total'=> $barang->harga,
              ]);
                // dd($cat);
                return redirect('/')->with('message', $cat ? 'Berhasil Di Masukkan Ke Keranjang' : 'gagal');
            }
        } else {
            Alert::error('Akses Ditolak', 'Silahkan Login terlebih Dahulu');
        }
    }
}
