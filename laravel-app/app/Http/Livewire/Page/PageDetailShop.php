<?php

namespace App\Http\Livewire\Page;

use App\Models\Barang;
use Livewire\Component;
use App\Models\Keranjang;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PageDetailShop extends Component
{
    public $itemID;
    public function mount($itemID){
        $this->itemID = $itemID;
    }
    public function render()
    {
        $barang = Barang::find($this->itemID);
        return view('livewire.page.page-detail-shop',[
            'barang'=> $barang,
        ]);
    }
    public function addToCart($id)
    {
        // dd("hai");
        if (Auth::check()) {
            $userID = auth()->user()->id;
            $barang = Barang::find($id);
            if(1 <= 0){
                Alert::info('Stock Habis', 'Stock Tidak Cukup');
            }else{
              $cat = Keranjang::create([
                'user_id'=> $userID,
                'barang_id'=>$barang->id,
                'quantity'=> 1,
                'sub_total'=> $barang->harga,
              ]);
                // dd($cat);
                return redirect('/')->with('message', $cat ? 'Berhasil Di Masukkan Ke Keranjang' : 'gagal');
            }
        } else {
            Alert::error('Akses Ditolak', 'Silahkan Login terlebih Dahulu');
        }
    }
}
