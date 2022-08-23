<?php

namespace App\Http\Livewire\Page;

use Livewire\Component;

class ShoppingCart extends Component
{
    public $Keranjang = false;
    public function render()
    {
        return view('livewire.page.shopping-cart');
    }
    public function show(){
        // dd($this->Keranjang);
        $this->Keranjang = false;
    }
}
