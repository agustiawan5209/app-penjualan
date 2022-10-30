<?php

namespace App\Http\Livewire\Admin;

use App\Models\Barang;
use Livewire\Component;
use App\Models\BarangKeluar;
use RealRashid\SweetAlert\Facades\Alert;

class PageBarangKeluar extends Component
{
    public $search = '';
    public $itemAdd = false,  $itemEdit = false, $itemDelete = false, $itemID;
    public $barang_id, $tgl_masuk, $jumlah, $status ,$pemasok;
    public function render()
    {
        $barangkeluar = BarangKeluar::latest()->get();
        $barang = Barang::all();
        return view('livewire.admin.page-barang-keluar',[
            'barangkeluar'=> $barangkeluar,
            'barang'=> $barang,

        ]);
    }
    public function addModal()
    {
        $this->itemAdd = true;
    }
    public function editModal($id)
    {
        $this->itemAdd = true;
        $this->itemEdit = true;
        $barang = BarangKeluar::find($id);
        $this->itemID = $barang->id;
        $this->barang_id = $barang->barang_id;
        $this->status = $barang->status;
        $this->jumlah = $barang->jumlah;
        $this->pemasok = $barang->pemasok;
        $this->tgl_masuk = $barang->tgl_masuk;
    }
    public function deleteModal($id){
        $this->itemDelete = true;
        $this->itemID = $id;
    }
    public function create(){
        $valid =  $this->validate([
             'barang_id'=> 'required',
             'jumlah'=> 'required',
            //  'pemasok'=> 'required',
             'tgl_masuk'=> 'required',
             'status'=> 'required',
         ]);
         $barang = BarangKeluar::create($valid);
         Alert::success('Info', 'Berhasil Di Tambah');
         $this->itemAdd = false;
     }
     public function edit($id){
        $valid =  $this->validate([
             'barang_id'=> 'required',
             'jumlah'=> 'required',
             'pemasok'=> 'required',
         ]);
         $barang = BarangKeluar::find($id)->update($valid);
         Alert::success('Info', 'Berhasil Di Tambah');
         $this->itemAdd = false;
     }
}
