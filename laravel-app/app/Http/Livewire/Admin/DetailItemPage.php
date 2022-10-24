<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Transaksi;

class DetailItemPage extends Component
{
    public $idItem ;
    public $ID_transaksi;
    public $row =10, $search = "", $order = 'asc';
    public function mount($idItem){
        $this->idItem = $idItem;
    }
    public function render()
    {
        $transaksi = Transaksi::with(['barang'])->orderBy('id', $this->order)->where('ID_transaksi', $this->idItem)->paginate($this->row);
        if($this->search != ""){
            $transaksi = Transaksi::with(['barang'])->orderBy('id', $this->order)
            ->where('ID_transaksi', 'like', '%'. $this->search .'%')
            ->paginate($this->row);
        }
        return view('livewire.admin.detail-item-page',compact('transaksi'));
    }
}
