<?php

namespace App\Http\Livewire\Item;

use App\Models\Ongkir;
use App\Models\StatusBarang;
use Livewire\Component;

class PageStatusBarang extends Component
{
    public $status = false;
    public $barang_id;
    public $ongkir_id;
    public function mount($barang_id, $ongkir_id, $status){
        $this->barang_id= $barang_id;
        $this->ongkir_id= $ongkir_id;
        $this->status= $status;
    }
    public function render()
    {
        $ongkir =Ongkir::where('id', $this->ongkir_id)->first();
        $status_ongkir = StatusBarang::with('ongkir')->where('ongkir_id', '=', $ongkir->id)->get();
        return view('livewire.item.page-status-barang',[
            'status_ongkir'=> $status_ongkir,
        ]);
    }
}
