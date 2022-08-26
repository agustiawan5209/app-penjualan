<?php

namespace App\Http\Livewire\Page;

use Cart;
use App\Models\Barang;
use Livewire\Component;

class Produklist extends Component
{
    public function render()
    {
        $produk = Barang::all();
        return view('livewire.page.produklist',[
            'produk'=> $produk,
        ]);
    }
    public function addToCart($id){
        $barang = Barang::find($id);
        Cart::add([
            'id' => $barang->id,
            'name' => $barang->nama_barang,
            'price' => $barang->harga,
            'quantity' => 1,
            'attributes' => array(
                'image' => $barang->gambar,
            )
        ]);
        session()->flash('message','Berhasil Di Masukkan Ke Cart');
    }
}
