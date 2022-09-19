<?php

namespace App\Http\Livewire\Item;

use Livewire\Component;

class PageStatusBarang extends Component
{
    public $status;
    public $barang_id;
    public $ongkir_id;
    public function mount($barang_id, $ongkir_id, $status){
        $this->barang_id= $barang_id;
        $this->ongkir_id= $ongkir_id;
        $this->status= $status;
    }
    public function render()
    {
        return view('livewire.item.page-status-barang');
    }
}
