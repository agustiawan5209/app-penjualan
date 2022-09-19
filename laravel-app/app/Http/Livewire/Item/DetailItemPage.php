<?php

namespace App\Http\Livewire\Item;

use App\Models\Transaksi;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class DetailItemPage extends Component
{
    public $idItem ;
    public $ID_transaksi;
    public function mount($idItem){
        $this->idItem = $idItem;
    }
    public function render()
    {
        $transaksi = Transaksi::where('ID_transaksi', $this->ID_transaksi)->get();
        return view('livewire.item.detail-item-page',compact('transaksi'));
    }
}
