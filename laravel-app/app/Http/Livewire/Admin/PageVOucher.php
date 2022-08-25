<?php

namespace App\Http\Livewire\Admin;

use App\Models\Voucher;
use Livewire\Component;

class PageVOucher extends Component
{
    public function render()
    {
        return view('livewire.admin.page-v-oucher');
    }
    public $itemAdd = false, $itemEdit = false , $itemHapus = false, $itemID;
    // field tabel promo
    public $kode_voucher,$promo_nominal = null,$promo_persen = null,$max_user,$use_user = null,$tgl_mulai,$tgl_kadaluarsa;

    public function TambahModal()
    {
        $this->itemAdd = true;
    }
    public function EditModal($id)
    {
        $promo = Voucher::find($id);
        $this->kode_voucher = $promo->kode_voucher;
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
        $promo = Voucher::find($id);
        $this->itemID = $promo->id;
        $this->hapusItem = true;
    }


    // CRUD Tabel Promo
    public function create(){
        $this->validate([
            'kode_voucher'=> 'required|unique:promo.kode_voucher',
            'tgl_mulai'=> 'required',
            'tgl_kadaluarsa'=> 'required',
            'max_user'=> 'required',
        ]);
        Voucher::create([
            'kode_voucher'=> $this->kode_voucher,
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
            'kode_voucher'=> 'required|unique:promo.kode_voucher',
            'tgl_mulai'=> 'required',
            'tgl_kadaluarsa'=> 'required',
            'max_user'=> 'required',
        ]);
        Voucher::where('id', $id)->update([
            'kode_voucher'=> $this->kode_voucher,
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
        Voucher::where('id',$id)->delete();
        session()->flash('message', 'Berhasil Di Edit');
        $this->itemHapus = false;
    }
}
