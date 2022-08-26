<?php

namespace App\Http\Livewire\Page;

use Livewire\Component;

class ShoppingCart extends Component
{

    protected $listeners = ['cartUpdated' => '$refresh'];
    public $cartItems = [];
    public $quantity = 0;
    public $Keranjang = false;
    public function render()
    {
        $this->cartItems = \Cart::getContent()->toArray();
        // dd($this->cartItems);
        return view('livewire.page.shopping-cart');
    }
    public function show(){
        // dd($this->Keranjang);
        $this->Keranjang = false;
    }
    public function removeCart($id)
    {
        \Cart::remove($id);

        session()->flash('success', 'Item has removed !');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');
    }
    public function updateCart($id)
    {
        \Cart::update($id, [
            'quantity' => [
                'relative' => false,
                'value' => $this->quantity
            ],
            // 'price'=> [
            //     'value'=>
            // ]
        ]);

        // $this->emit('cartUpdated');
    }

}
