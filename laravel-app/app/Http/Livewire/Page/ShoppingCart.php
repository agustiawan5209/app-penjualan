<?php

namespace App\Http\Livewire\Page;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ShoppingCart extends Component
{
    protected $listeners = ['cartUpdated' => '$refresh'];
    public $cartItems = [];
    public $quantity = 1;
    public $Keranjang = false;

    public function render()
    {
        $userID = Auth::user()->id;
        $this->cartItems = \Cart::getContent();
        // dd($this->cartItems);
        return view('livewire.page.shopping-cart');
    }
    public function show()
    {
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
    public function PlusupdateCart($id)
    {
        $cart = \Cart::get($id);
         $cat = \Cart::update($id, [
            'quantity' => [
                'relative' => false,
                'value' => $this->quantity++,
            ],
        ]);
        if($cat){
            \Cart::update($id,array(
                'price' => $cart['quantity'] * $cart['price'],
            ));
        }

        // $this->emit('cartUpdated');
    }
    public function MinusupdateCart($id)
    {
        $cart = \Cart::get($id);
         $cat = \Cart::update($id, [
            'quantity' => [
                'relative' => false,
                'value' => $this->quantity--,
            ],
        ]);
        if($cat){
            \Cart::update($id,array(
                'price' => $this->quantity * $cart['price'],
            ));
        }

        // $this->emit('cartUpdated');
    }
    public function CheckOut()
    {
        return redirect()->route('Customer.Pembayaran');
    }
}
