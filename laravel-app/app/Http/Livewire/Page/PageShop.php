<?php

namespace App\Http\Livewire\Page;

use App\Models\Jenis;
use App\Models\Barang;
use Livewire\Component;
use App\Models\Keranjang;
use Illuminate\Support\Facades\Auth;
use Alert;

class PageShop extends Component
{

    public $showDetail = false;
    public $itemID;
    public $alert = false;

    // get Param URL
    public $nama_jenis;
    public function mount(){
    }
    /**
     * ShowDetail
     * Tampilkan Halaman Detail
     * PageDetailShop.php
     * @param  mixed $id
     * @return void
     */
    public function ShowDetail($id)
    {
        $this->showDetail = true;
        $this->itemID = $id;
    }

    public function render()
    {
        $produk = Barang::with(['satuan', 'jenis','diskon'])->get();
        $jenis = Jenis::all();
        return view('livewire.page.page-shop', [
            'produk' => $produk,
            'jenis' => $jenis,
        ])->layout('layouts.guest');
    }
    public function addToCart($id)
    {
        // dd("hai");
        if (Auth::check()) {
            $userID = auth()->user()->id;
            $barang = Barang::find($id);
            if (1 <= 0) {
                Alert::info('Stock Habis', 'Stock Tidak Cukup');
            } else {
                // Cek Jika barang_id Sudah Ada Atau Belum
                $cart = Keranjang::where('user_id', Auth::user()->id)
                    ->where('barang_id', '=', $id)
                    ->get();
                   $br =  Barang::find($id);
                   Barang::find($id)->update([
                    'stock'=> $br->stock - 1,
                   ]);
                // dd($cart);
                if ($cart->count() > 0) {
                    Alert::warning('Gagal', 'Barang Sudah Dalam Keranjang');
                } else {
                    $cat = Keranjang::create([
                        'user_id' => $userID,
                        'barang_id' => $barang->id,
                        'quantity' => 1,
                        'total_awal' => $barang->harga,
                        'sub_total' => $barang->harga,
                    ]);
                    // dd($cat);
                    Alert::info('Pemesanan Berhasil Cek Pesanan Anda', 'info');
                    return redirect()->route('Keranjang');
                }
            }
        } else {
            // Alert::error('Akses Ditolak', 'Silahkan Login terlebih Dahulu');
            // example:
            Alert::info('Maaf Silahkan Login Terlebih Dahulu', 'error');
        }
    }
}
