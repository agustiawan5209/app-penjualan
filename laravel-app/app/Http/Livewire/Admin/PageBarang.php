<?php

namespace App\Http\Livewire\Admin;

use App\Models\Jenis;
use App\Models\Barang;
use App\Models\Satuan;
use Livewire\Component;
use Livewire\WithPagination;

class PageBarang extends Component
{
    use WithPagination;
    // item Search Dan Row
    public $search ="", $row =10;
    // Item FIeld Table
    // Barang

    public $gambar, $kode_barang, $jenis_id,$satuan_id,$harga,$deskripsi,$tgl_perolehan, $itemID;


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


    /*
    * FUngsi Modal Barang
    * Edit Hapus Tambah
    */
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


    /*
    * Fungsi CRUD Barang
    */
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
        $this->itemTambah = false;
    }
    public function edit($id){
        if($this->gambar != null){
            $nama = $this->gambar->getClientOriginalName();
            $random = bcrypt($nama). '.' . $this->gambar->getClientOriginalExtension();
            $this->gambar->storeAs('upload', $random);
        }
        $barang = Barang::where($id)->update([
            'gambar'=> $random,
            'kode_barang'=> $this->kode_barang,
            'jenis_id'=> $this->jenis_id,
            'satuan_id'=> $this->satuan_id,
            'harga'=> $this->harga,
            'deskripsi'=> $this->deskripsi,
            'tgl_perolehan'=> $this->tgl_perolehan,
        ]);
        session()->flash('message', 'Berhasil Di Edit');
        $this->itemEdit = false;
    }
    public function delete($id){
        Barang::find($id)->delete();
        session()->flash('message', 'Berhasil Ditambah');
        $this->itemHapus = false;
    }


    // Crud Jenis
    // itemJenis
    public $addJenis = false, $editJenis = false, $hapusJenis = false;
    // field tabel jenis;
    public $nama_Jenis;
    public function tambahJenis(){
        $this->addJenis = true;
    }
    public function editJenisModal($id){
        $jenis = Jenis::find($id);
        $this->nama_Jenis = $jenis->nama_jenis;
        $this->editJenis = true;
    }
    public function hapusJenisModal($id){
        $jenis = Jenis::find($id);
        $this->itemID = $jenis->id;
    }

    public function createJenis(){
        Jenis::create([
            'nama_jenis'=> $this->nama_Jenis,
        ]);
        $this->addJenis = false;
    }
    public function editJenis($id){
        Jenis::where('id', $id)->update([
            'nama_jenis'=> $this->nama_Jenis,
        ]);
        $this->editJenis = false;
    }
    public function hapusJenis($id){
        Jenis::find($id)->delete();
        $this->hapusJenis = false;
    }

    // Satuan
    // Crud Satuan
    // itemSatuan
    public $addSatuan = false, $editSatuan = false, $hapusSatuan = false;
    // field tabel Satuan;
    public $nama_Satuan;
    public function tambahSatuan(){
        $this->addSatuan = true;
    }
    public function editSatuanModal($id){
        $Satuan = Satuan::find($id);
        $this->nama_Satuan = $Satuan->nama_Satuan;
        $this->editSatuan = true;
    }
    public function hapusSatuanModal($id){
        $Satuan = Satuan::find($id);
        $this->itemID = $Satuan->id;
    }

    public function createSatuan(){
        Satuan::create([
            'nama_Satuan'=> $this->nama_Satuan,
        ]);
        $this->addSatuan = false;
    }
    public function editSatuan($id){
        Satuan::where('id', $id)->update([
            'nama_Satuan'=> $this->nama_Satuan,
        ]);
        $this->editSatuan = false;
    }
    public function hapusSatuan($id){
        Satuan::find($id)->delete();
        $this->hapusSatuan = false;
    }
}
