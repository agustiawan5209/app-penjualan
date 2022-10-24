<?php

namespace App\Http\Livewire\Page;

use App\Models\Jenis;
use App\Models\Barang;
use Livewire\Component;
use App\Models\Keranjang;
use Illuminate\Support\Facades\Auth;
use Alert;
use App\Models\Katalog;

class PageShop extends Component
{

    public $showDetail = false;
    public $itemID;
    public $alert = false;
    public $row =10;

    // get Param URL
    public $nama_jenis;
    public function mount($nama_jenis){
        $this->nama_jenis = $nama_jenis;
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
        return redirect()->route('Shop-detail', ['itemID'=> $id]);
    }

    public function render()
    {
        // dd($this->nama_jenis);
        $produk = Barang::with(['satuan', 'katalog','diskon'])->paginate(10);
        $jenis = Jenis::all();
        if($this->nama_jenis != null){
            $produk = Barang::with(['satuan', 'katalog','diskon'])
            ->orWhere('katalog_id', '=', $this->nama_jenis)
            ->orWhereHas('katalog', function($query){
                return $query->where('nama_katalog', 'like', '%'. $this->nama_jenis .'%');
            })
            ->paginate($this->row);
        }
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
    public function loadmore(){
        $this->row = $this->row + 10;
    }
}
