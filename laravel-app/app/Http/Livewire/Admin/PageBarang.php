<?php

namespace App\Http\Livewire\Admin;

use App\Models\Barang;
use Livewire\Component;
use Livewire\WithPagination;

class PageBarang extends Component
{
    use WithPagination;
    // item Search Dan Row
    public $search ="", $row =10;
    public function render()
    {
        $barang = Barang::orderBy('id','desc')->paginate($this->row);
        if($this->search != null){
            $barang = Barang::where('kode_barang', 'like', '%'. $this->search .'%')
            ->orWhere('harga', 'like','%'.  $this->search .'%')
            ->orWhereDate('tgl_perolehan', 'like','%'. $this->search .'%')
            ->orderBy('id','desc')->paginate($this->row);
        }

        return view('livewire.admin.page-barang', compact('barang'));
    }


    // Item Modal
    public $itemTambah = false, $itemHapus = false, $itemEdit = false;
    public function TambahModal(){
        $this->itemTambah = true;
        session()->flash('message', 'Berhasil Ditambah');
    }

    public function HapusModal(){
        $this->itemHapus = true;
    }
    public function EditModal(){
        $this->itemEdit = true;
    }

    // Item FIeld Table
    // Barang
    public $gambar, $kode_barang, $jenis_id,$satuan_id,$harga,$deskripsi,$tgl_perolehan;
    // CRUD TABLE BARANG
    public function create(){
       $valid =   $this->validate([
            'gambar' =>'image|max:2040',
            'kode_barang'=> 'required',
            'jenis_id'=> 'required',
            'satuan_id'=> 'required',
            'harga'=> 'required',
            'deskripsi'=> 'required',
            'tgl_perolehan'=> 'required',
        ]);
        if($this->gambar != null){
            $nama = $this->gambar->getClientOriginalName();
            $random = bcrypt($nama). '.' . $this->gambar->getClientOriginalExtension();
            $this->gambar->storeAs('upload', $random);
        }
        $barang = Barang::insert([
            'gambar'=> $random,
            'kode_barang'=> $this->kode_barang,
            'jenis_id'=> $this->jenis_id,
            'satuan_id'=> $this->satuan_id,
            'harga'=> $this->harga,
            'deskripsi'=> $this->deskripsi,
            'tgl_perolehan'=> $this->tgl_perolehan,
        ]);

        session()->flash('message', 'Berhasil Ditambah');
    }

}
