<?php

namespace App\Http\Livewire\Page;

use App\Models\Barang;
use App\Models\Diskon;
use Livewire\Component;
use App\Models\Keranjang;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PageDetailShop extends Component
{
    public $itemID;
    public $count = 1;
    public function mount($itemID)
    {
        $this->itemID = $itemID;
    }
    public function render()
    {
        $barang = Barang::find($this->itemID);
        $barang_lain = Barang::whereNotIn('id', [$barang->id])
            ->where('katalog_id', '=', $barang->katalog)
            // ->orWhere('satuan_id', '=', $barang->satuan_id)
            ->get();
        return view('livewire.page.page-detail-shop', [
            'barang' => $barang,
            'barang_lain' => $barang_lain,
        ])->layout('layouts.guest');
    }
    public function addToCart($id)
    {
        // dd("hai");
        if (Auth::check()) {
            $userID = auth()->user()->id;
            $barang = Barang::find($id);
            // Cek Keranajng Barang
            $keranjang = Keranjang::where('barang_id', '=', $barang->id)->where('user_id', Auth::user()->id)->get();
            // Cek Diskon

            if (1 <= 0) {
                Alert::info('Stock Habis', 'Stock Tidak Cukup');
            } else {
                if ($keranjang->count() > 0) {
                    foreach ($keranjang as $item) {
                        $stok_h = $item->quantity + $this->count;
                        $total_harga = $stok_h * $barang->harga;
                    }
                    $keranjang = Keranjang::where('barang_id', '=', $barang->id)->update([
                        'quantity' => $stok_h,
                        'sub_total' => $total_harga,
                    ]);
                } else {
                    $cat = Keranjang::create([
                        'user_id' => $userID,
                        'barang_id' => $barang->id,
                        'quantity' => $this->count,
                        'total_awal' => $barang->harga,
                        'sub_total' => $barang->harga * $this->count,
                    ]);
                }
                $br =  Barang::find($id);
                Barang::find($id)->update([
                    'stock' => $br->stock - $this->count,
                ]);
                // dd($cat);
                $this->count = 1;
                toast('Barang Berhasil Dimasukan Keranjang', 'success')->timerProgressBar();
                return redirect('/')->route('Keranjang');
            }
        } else {
            Alert::error('Akses Ditolak', 'Silahkan Login terlebih Dahulu');
        }
    }

    public function countplus()
    {
        $barang = Barang::find($this->itemID);
        if ($barang->stock > $this->count) {
            $this->count++;
        }
    }
    public function countminus()
    {
        if ($this->count > 0) {
            $this->count--;
        } else {
            $this->count = 1;
        }
    }

    public function ShowDetail($id)
    {
        return redirect()->route('Shop-detail', ['itemID' => $id]);
    }
    public function BeliBarang($id)
    {
        $cart = Barang::find($id);
        $arr[] = Diskon::where('barang_id', $id)->sum('jumlah_diskon');
        $jumlah_diskon = (int) array_sum($arr);
        $sub_total = $cart->harga;
        $diskon = ($jumlah_diskon / 100) * $sub_total;
        $total_bayar = $sub_total - $diskon;
        session()->put('keranjang', [
            'item' => $cart,
            'potongan' => $diskon,
            'sub_total' => $sub_total,
            'total_bayar' => $total_bayar,
            'jenis' => 'beli',
        ]);
        return redirect()->route('Customer.Page-Pembayaran');
    }
}
