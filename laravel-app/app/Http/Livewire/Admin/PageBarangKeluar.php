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
    public $barang_id, $tgl_keluar, $jumlah, $status ,$pemasok;
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
        $this->tgl_keluar = $barang->tgl_keluar;
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
             'tgl_keluar'=> 'required',
            //  'status'=> 'required',
         ]);
         $barang = Barang::find($this->barang_id);
         $count = $barang->stock - $this->jumlah;
         $barang->update([
            'stock'=> $count
         ]);
        BarangKeluar::create($valid);
         Alert::success('Info', 'Berhasil Di Tambah');
         $this->itemAdd = false;
     }
     public function edit($id){
        $valid =  $this->validate([
             'barang_id'=> 'required',
             'jumlah'=> 'required',
         ]);
         $barang = BarangKeluar::find($id)->update($valid);
         Alert::success('Info', 'Berhasil Di Tambah');
         $this->itemAdd = false;
     }
     public function delete($id){
        BarangKeluar::find($id)->delete();
        Alert::error('Info', "Berhasil Di Hapus");
        $this->itemDelete = false;
     }
}
