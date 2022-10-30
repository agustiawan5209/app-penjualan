<?php

namespace App\Http\Livewire\Admin;

use App\Models\Barang;
use Livewire\Component;
use App\Models\BarangMasuk;
use RealRashid\SweetAlert\Facades\Alert;

class PageBarangMasuk extends Component
{
    public $search = '';
    public $itemAdd = false;
    public $barang_id, $tgl_masuk, $jumlah, $status ,$pemasok;
    public function render()
    {
        $barangMasuk = BarangMasuk::latest()->get();
        $barang = Barang::all();
        return view('livewire.admin.page-barang-masuk',[
            'barangmasuk'=> $barangMasuk,
            'barang'=> $barang,

        ]);
    }
    public function addModal()
    {
        $this->itemAdd = true;
    }
    public function create(){
        $valid =  $this->validate([
             'barang_id'=> 'required',
             'jumlah'=> 'required',
            //  'pemasok'=> 'required',
             'tgl_masuk'=> 'required',
         ]);
         $barang = BarangMasuk::create($valid);
         Alert::success('Info', 'Berhasil Di Tambah');
         $this->itemAdd = false;
     }
     public function edit($id){
        $valid =  $this->validate([
             'barang_id'=> 'required',
             'jumlah'=> 'required',
             'pemasok'=> 'required',
         ]);
         $barang = BarangMasuk::find($id)->update($valid);
         Alert::success('Info', 'Berhasil Di Tambah');
         $this->itemAdd = false;
     }
}
