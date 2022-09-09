<?php

namespace App\Http\Livewire\Page;

use App\Models\Keranjang;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ShoppingCart extends Component
{
    protected $listeners = ['cartUpdated' => '$refresh'];
    // public $cartItems = [];
    public $quantity = 1;
    public $Keranjang = false;
    public $itemID;

    public function mount(){
        abort_if(Auth::check() == false, 401);
    }
    public function render()
    {
        // dd($this->cartItems);
        $cart = Keranjang::where('user_id', Auth::user()->id)->get();
        return view('livewire.page.shopping-cart',[
            'cart'=> $cart,
        ])->layout('layouts.guest');
    }
    public function show($id)
    {
        // dd($this->Keranjang);
        $Keranjang = Keranjang::find($id);
        // dd($Keranjang);
        $this->itemID = $Keranjang->id;
        $this->Keranjang = true;
    }
    public function removeCart($id)
    {
        Keranjang::find($id)->delete();
        Alert::success('Berhasil', 'Berhasil Di Hapus !');
    }

    public function clearAllCart()
    {
        Keranjang::where('user_id', Auth::user()->id)->delete();
        Alert::success('Berhasil', 'Semua Item Berhasil Di Hapus !');
    }
    public function PlusupdateCart($id)
    {
        $cart = Keranjang::find($id);
        $cat = Keranjang::where('id', $id)->update([
            'quantity' => $cart->quantity + 1,
        ]);
        if ($cat) {
            Keranjang::where('id', $id)->update([
                'sub_total' => $cart->quantity * $cart->barang->harga,
            ]);
        }

        // $this->emit('cartUpdated');
    }
    public function MinusupdateCart($id)
    {
        $cart = Keranjang::find($id);
        $cat = Keranjang::where('id', $id)->update([
            'quantity' => $cart->quantity - 1,
        ]);
        if ($cat) {
            Keranjang::where('id', $id)->update([
                'sub_total' => $cart->quantity * $cart->barang->harga,
            ]);
        }

        // $this->emit('cartUpdated');
    }
    public function CheckOut()
    {
        return redirect()->route('Customer.Pembayaran');
    }
}
