<?php

namespace App\Http\Livewire\Admin;

use App\Models\Promo;
use Livewire\Component;

class PagePromo extends Component
{
    public function render()
    {
        return view('livewire.admin.page-promo');
    }

    // Item Modal Promo
    public $itemAdd = false, $itemEdit = false , $itemHapus = false, $itemID;
    // field tabel promo
    public $kode_promo,$promo_nominal = null,$promo_persen = null,$max_user,$use_user = null,$tgl_mulai,$tgl_kadaluarsa;

    public function TambahModal()
    {
        $this->itemAdd = true;
    }
    public function EditModal($id)
    {
        $promo = Promo::find($id);
        $this->kode_promo = $promo->kode_promo;
        $this->promo_nominal = $promo->promo_nominal;
        $this->promo_persen = $promo->promo_persen;
        $this->tgl_mulai = $promo->tgl_mulai;
        $this->tgl_kadaluarsa = $promo->tgl_kadaluarsa;
        $this->max_user = $promo->max_user;
        $this->itemID = $promo->itemID;
        $this->itemEdit = true;
    }
    public function HapusModal($id)
    {
        $promo = Promo::find($id);
        $this->itemID = $promo->id;
        $this->hapusItem = true;
    }


    // CRUD Tabel Promo
    public function create(){
        $this->validate([
            'kode_promo'=> 'required|unique:promo.kode_promo',
            'tgl_mulai'=> 'required',
            'tgl_kadaluarsa'=> 'required',
            'max_user'=> 'required',
        ]);
        Promo::create([
            'kode_promo'=> $this->kode_promo,
            'promo_nominal'=> $this->promo_nominal,
            'promo_persen'=> $this->promo_persen,
            'tgl_mulai'=> $this->tgl_mulai,
            'tgl_kadaluarsa'=> $this->tgl_kadaluarsa,
            'max_user'=> $this->max_user,
        ]);
        session()->flash('message', 'Berhasil Di Tambah');
        $this->itemAdd = false;
    }
    public function edit($id){
        $this->validate([
            'kode_promo'=> 'required|unique:promo.kode_promo',
            'tgl_mulai'=> 'required',
            'tgl_kadaluarsa'=> 'required',
            'max_user'=> 'required',
        ]);
        Promo::where('id', $id)->update([
            'kode_promo'=> $this->kode_promo,
            'promo_nominal'=> $this->promo_nominal,
            'promo_persen'=> $this->promo_persen,
            'tgl_mulai'=> $this->tgl_mulai,
            'tgl_kadaluarsa'=> $this->tgl_kadaluarsa,
            'max_user'=> $this->max_user,
        ]);
        session()->flash('message', 'Berhasil Di Edit');
        $this->itemEdit = false;
    }
    public function delete($id){
        Promo::where('id',$id)->delete();
        session()->flash('message', 'Berhasil Di Edit');
        $this->itemHapus = false;
    }
}
