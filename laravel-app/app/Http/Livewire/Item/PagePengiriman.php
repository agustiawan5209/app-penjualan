<?php

namespace App\Http\Livewire\Item;

use App\Models\Ongkir;
use Livewire\Component;

class PagePengiriman extends Component
{
    public $status = false;
    public $row= 10,$search = '', $order = 'asc';
    public $itemID;
    public function render()
    {
        $ongkir = Ongkir::orderBy('id', $this->order)->paginate($this->row);
        return view('livewire.item.page-pengiriman', compact('ongkir'));
    }
    public function lihatStatus($id){
        $this->itemID = $id;
        $this->status = true;
    }
}
