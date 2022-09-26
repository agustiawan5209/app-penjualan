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
    public $count= 1;
    public function mount($itemID){
        $this->itemID = $itemID;
    }
    public function render()
    {
        $barang = Barang::find($this->itemID);
        $barang_lain = Barang::whereNotIn('id',[ $barang->id])
        ->where('jenis_id', '=', $barang->jenis_id)
        // ->orWhere('satuan_id', '=', $barang->satuan_id)
        ->get();
        return view('livewire.page.page-detail-shop',[
            'barang'=> $barang,
            'barang_lain'=> $barang_lain,
        ])->layout('layouts.guest');
    }
    public function addToCart($id)
    {
        // dd("hai");
        if (Auth::check()) {
            $userID = auth()->user()->id;
            $barang = Barang::find($id);

            // Cek Diskon

            if(1 <= 0){
                Alert::info('Stock Habis', 'Stock Tidak Cukup');
            }else{
              $cat = Keranjang::create([
                'user_id'=> $userID,
                'barang_id'=>$barang->id,
                'quantity'=> $this->count,
                'total_awal'=> $barang->harga,
                'sub_total'=> $barang->harga * $this->count,
              ]);
              $br =  Barang::find($id);
              Barang::find($id)->update([
               'stock'=> $br->stock - $this->count,
              ]);
                // dd($cat);
                $this->count = 1;
                toast('Barang Berhasil Dimasukan Keranjang','success')->timerProgressBar();
                return redirect('/')->route('Keranjang');
            }
        } else {
            Alert::error('Akses Ditolak', 'Silahkan Login terlebih Dahulu');
        }
    }

    public function countplus(){
        $barang = Barang::find($this->itemID);
        if($barang->stock > $this->count){
            $this->count++;
        }
    }
    public function countminus(){
        if( $this->count > 0){
            $this->count--;
        }else{
            $this->count = 1;
        }
    }
}
