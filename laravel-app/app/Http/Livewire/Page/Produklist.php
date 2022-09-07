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
        ])->layout('layouts.guest');
    }

}
