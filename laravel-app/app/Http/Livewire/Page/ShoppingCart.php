<?php

namespace App\Http\Livewire\Page;

use App\Models\Diskon;
use App\Models\Keranjang;
use Carbon\Carbon;
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
    public $harga = 0,
        $diskon = 0,
        $sub_total = 0,
        $promo = 0,
        $voucher = 0,
        $total_bayar = 0,
        $potongan = 0;
    public function mount()
    {
        abort_if(Auth::check() == false, 401, 'Maaf Silahkan Login Terlebih Dahulu', ['message' => 'Akses Di Tolak']);
    }

    public function cekPotongan($barang)
    {
    }

    public function render()
    {
        $arr = [];
        $carbon = Carbon::now()->format('Y-m-d');
        $cart = Keranjang::where('user_id', Auth::user()->id)->get();
        $subtotal = Keranjang::sum('sub_total');
        $quantity = Keranjang::sum('quantity');
        // $diskon_kadaluarsa = Diskon::whereDate('tgl_kadaluarsa', '<' , $carbon)->delete();
        $this->sub_total = $subtotal * $quantity;
        foreach ($cart as $keranjang) {
            $arr[] = Diskon::where('barang_id', $keranjang->barang_id)->sum('jumlah_diskon');
        }
        $jumlah_diskon = (int) array_sum($arr);
        $this->diskon = ($jumlah_diskon / 100) * $this->sub_total ;
        $this->potongan = $this->diskon - $this->promo - $this->voucher;

        $this->total_bayar = $this->sub_total - $this->potongan;
        return view('livewire.page.shopping-cart', [
            'cart' => $cart,
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
