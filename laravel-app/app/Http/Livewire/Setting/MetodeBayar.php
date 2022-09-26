<?php

namespace App\Http\Livewire\Setting;

use App\Models\Bank;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class MetodeBayar extends Component
{
    public $itemAdd = false, $itemEdit = false, $itemDelete = false;
    public $nama_bank, $no_rek, $nama_pemilik, $itemID;
    public function clearAll(){
        $this->itemAdd = false;
        $this->itemEdit = false;
        $this->itemDelete = false;
        $this->nama_bank = null;
        $this->no_rek = null;
        $this->nama_pemilik = null;
        $this->itemID = null;
    }
    public function render()
    {
        $bank = Bank::all();
        return view('livewire.setting.metode-bayar',[
            'bank'=> $bank
        ]);
    }

    public function addModal(){

        $this->itemAdd = true;
    }

    public function create(){
       $bank =  $this->validate([
            'nama_pemilik'=> ['required'],
            'no_rek'=> ['required', 'integer'],
            'nama_bank'=> ['required', 'string'],
        ]);
        Bank::create($bank);
        Alert::success('Info', "Berhasil Di Tambah");
        $this->clearAll();
    }
    public function editModal($id){
        $bank = Bank::find($id);
        $this->nama_bank = $bank->nama_bank;
        $this->nama_pemilik = $bank->nama_pemilik;
        $this->no_rek = $bank->no_rek;
        $this->itemID = $id;
        $this->itemEdit = true;
    }

    public function edit($id){
       $bank =  $this->validate([
            'nama_pemilik'=> ['required'],
            'no_rek'=> ['required', 'integer'],
            'nama_bank'=> ['required', 'string'],
        ]);
        Bank::find($id)->update($bank);
        Alert::success('Info', "Berhasil Di Edit");
        $this->clearAll();
    }
    public function deleteModal($id){
        $this->itemID = $id;
        $this->itemDelete = true;
    }

    public function delete($id){
        Bank::find($id)->delete();
        Alert::success('Info', "Berhasil Di Hapus");
        $this->clearAll();
    }
}
