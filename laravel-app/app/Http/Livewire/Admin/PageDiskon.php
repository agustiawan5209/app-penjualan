<?php

namespace App\Http\Livewire\Admin;

use App\Models\Barang;
use App\Models\DIskon;
use Livewire\Component;

class PageDiskon extends Component
{
    // Item Tambah Modal
    public $addItem = false;
    public $editItem = false;
    public $hapusItem = false;

    // item field table DISKON
    public $itemID;
    public $jumlah_diskon, $tgl_kadaluarsa, $tgl_mulai, $barang_id;

    // itemSearch And Row
    public $search = '', $row=10;
    public function closeModal(){
        $this->editItem=false;
        $this->addItem = false;
    }
    public function render()
    {
        $diskon = DIskon::paginate($this->row);
        $barang = Barang::all();
        return view('livewire.admin.page-diskon',[
            'diskon'=> $diskon,
            'barang'=> $barang,
        ]);
    }

    public function TambahModalDsikon()
    {
        $this->addItem = true;
    }
    public function EditModalDsikon($id)
    {
        $diskon = DIskon::find($id);
        $this->barang_id = $diskon->barang_id;
        $this->jumlah_diskon = $diskon->jumlah_diskon;
        $this->tgl_kadaluarsa = $diskon->tgl_kadaluarsa;
        $this->tgl_mulai = $diskon->tgl_mulai;
        $this->editItem = true;
    }
    public function HapusModalDsikon($id)
    {
        $diskon = DIskon::find($id);
        $this->itemID = $diskon->id;
        $this->hapusItem = true;
    }

    // CRUD TABEL DISKON
    public function createDsikon()
    {
        $valid =   $this->validate([
            'barang_id' => 'required',
            'jumlah_diskon' => ['required', 'numeric'],
            'tgl_mulai' => 'required',
            'tgl_kadaluarsa' => 'required',
        ]);
        $diskon = DIskon::create($valid);
        session()->flash('message', 'Berhasil Di Tambah');
        $this->addItem = false;
    }
    public function editDsikon($id){
        $valid =   $this->validate([
            'barang_id' => 'required',
            'jumlah_diskon' => ['required', 'numeric'],
            'tgl_mulai' => 'required',
            'tgl_kadaluarsa' => 'required',
        ]);
        $diskon = DIskon::where('id', $id)->update($valid);
        session()->flash('message', 'Berhasil Di Edit');
        $this->editItem = false;
    }
    public function deleteDsikon($id){
        DIskon::where('id',$id)->delete();
        session()->flash('message', 'Berhasil Di Hapus');
        $this->hapusItem = false;
    }
}
