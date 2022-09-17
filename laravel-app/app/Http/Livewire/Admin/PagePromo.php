<?php

namespace App\Http\Livewire\Admin;

use App\Models\Promo;
use Livewire\Component;
use Livewire\WithPagination;
use Alert;

class PagePromo extends Component
{
    use WithPagination;

    // item Search Dan Row
    public $search = "", $row = 10;
    public function render()
    {
        $Promo = Promo::orderBy('id', 'desc')->paginate($this->row);
        if ($this->search != null) {
            $Promo = Promo::where('kode_Promo', 'like', '%' . $this->search . '%')
                ->orWhere('harga', 'like', '%' .  $this->search . '%')
                ->orWhereDate('tgl_perolehan', 'like', '%' . $this->search . '%')
                ->orderBy('id', 'desc')->paginate($this->row);
        }
        return view('livewire.admin.page-promo', compact('Promo'));
    }

    // Item Modal Promo
    public $itemAdd = false, $itemEdit = false, $itemHapus = false, $itemID;
    // field tabel promo
    public $kode_promo, $promo_nominal = null, $promo_persen = null, $max_user, $use_user = null, $tgl_mulai, $tgl_kadaluarsa;

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
        // dd('1');
        Alert::success('message', 'Berhasil Di Edit');
        $promo = Promo::find($id);
        $this->itemID = $promo->id;
        $this->hapusItem = true;
    }


    // CRUD Tabel Promo
    public function create()
    {
        $this->validate([
            'kode_promo' => 'required',
            'tgl_mulai' => 'required',
            'tgl_kadaluarsa' => 'required',
            'max_user' => 'required',
        ]);
        Promo::create([
            'kode_promo' => $this->kode_promo,
            'promo_nominal' => $this->promo_nominal,
            'promo_persen' => $this->promo_persen,
            'tgl_mulai' => $this->tgl_mulai,
            'tgl_kadaluarsa' => $this->tgl_kadaluarsa,
            'max_user' => $this->max_user,
        ]);
        Alert::info('message', 'Berhasil Di Tambah');
        $this->itemAdd = false;
    }
    public function edit($id)
    {
        $this->validate([
            'kode_promo' => 'required|unique:promo.kode_promo',
            'tgl_mulai' => 'required',
            'tgl_kadaluarsa' => 'required',
            'max_user' => 'required',
        ]);
        Promo::where('id', $id)->update([
            'kode_promo' => $this->kode_promo,
            'promo_nominal' => $this->promo_nominal,
            'promo_persen' => $this->promo_persen,
            'tgl_mulai' => $this->tgl_mulai,
            'tgl_kadaluarsa' => $this->tgl_kadaluarsa,
            'max_user' => $this->max_user,
        ]);
        Alert::info('message', 'Berhasil Di Edit');
        $this->itemEdit = false;
    }
    public function delete($id)
    {
        Promo::where('id', $id)->delete();
        Alert::info('message', 'Berhasil Di Edit');
        $this->itemHapus = false;
    }
    public function closeModal(){
        $this->itemAdd = false;
        $this->itemEdit = false;
        $this->itemHapus = false;
    }
}
