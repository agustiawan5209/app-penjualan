<?php

namespace App\Http\Livewire\Page;

use Cart;
use App\Models\Barang;
use App\Models\Jenis;
use App\Models\Keranjang;
use Auth;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;


class Produklist extends Component
{
    public $show = 5;
    public function render()
    {
        $produk = Barang::all();
        // \Cart::remove(1);
        $jenis = Jenis::paginate($this->show);
        return view('livewire.page.produklist', [
            'produk' => $produk,
            'jenis'=> $jenis,
        ])->layout('layouts.guest');
    }
    public function ShowDetail($id)
    {
        return redirect()->route('Shop-detail', ['itemID'=> $id]);
    }
    public function showMore(){
        $this->show = $this->show + 5;
    }
}
