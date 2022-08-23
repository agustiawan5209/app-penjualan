<?php

namespace App\Http\Livewire\Admin;

use App\Models\Barang;
use Livewire\Component;

class PageBarang extends Component
{
    public function render()
    {
        $barang = Barang::orderBy('id','desc')->paginate(10);

        return view('livewire.admin.page-barang', compact('barang'));
    }


    // Item Modal
    public $itemTambah = false, $itemHapus = false, $itemEdit = false;
    public function TambahModal(){
        $this->itemTambah = true;
    }

    public function HapusModal(){
        $this->itemHapus = true;
    }
    public function EditModal(){
        $this->itemEdit = true;
    }

    // CRUD TABLE BARANG


}
