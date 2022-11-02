<?php

namespace App\Http\Livewire\Admin;

use App\Models\Jenis;
use App\Models\Katalog;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use RealRashid\SweetAlert\Facades\Alert;

class PageJenis extends Component
{
    use WithFileUploads;
    // itemJenis
    public $addJenis = false,
        $editJenis = false,
        $hapusJenis = false, $itemKatalog = false;
    // field tabel jenis;
    public $nama_Jenis, $gambar_jenis, $dataKatalog,$addKatalog = false ,$itemID, $nama_katalog;
    public function render()
    {
        $jenis = Jenis::all();
        return view('livewire.admin.page-jenis', [
            'jenis'=> $jenis
        ]);
    }
    // Crud Jenis

    public function tambahJenis()
    {
        $this->addJenis = true;
    }
    public function editJenisModal($id)
    {
        $jenis = Jenis::find($id);
        $this->nama_Jenis = $jenis->nama_jenis;
        $this->gambar_jenis = $jenis->gambar;
        $this->itemID = $jenis->id;
        $this->addJenis = true;
        $this->editJenis = true;
    }
    public function hapusJenisModal($id)
    {
        $jenis = Jenis::find($id);
        $this->itemID = $jenis->id;
    }

    public function createJenis()
    {
        $this->validate([
            'nama_Jenis' => 'required',
            'gambar_jenis' => 'required',
        ]);
        $nama = $this->gambar_jenis->getClientOriginalName();
        $this->gambar_jenis->storeAs('upload/jenis', $nama);
        Jenis::create([
            'gambar' => $nama,
            'nama_jenis' => $this->nama_Jenis,
        ]);
        Alert::success("Info", 'Berhasil Di Tambah');
    }
    public function editJenis($id)
    {
        $this->validate([
            'nama_Jenis' => 'required',
            // 'gambar_jenis' => ['required'],
        ]);
        $jns = Jenis::find($id);
        if ($this->gambar_jenis != null) {
            if (Storage::exists('upload/jenis/' . $jns->gambar)) {
                $nama = $this->gambar_jenis->getClientOriginalName();

                Storage::delete('upload/jenis/' . $jns->gambar);
                $this->gambar_jenis->storeAs('upload/jenis', $nama);
            } else {
                $nama = $this->gambar_jenis->getClientOriginalName();
                $this->gambar_jenis->storeAs('upload/jenis', $nama);
            }
        }else{
            $nama = $jns->gambar;
        }
        Jenis::where('id', $id)->update([
            'gambar' => $nama,
            'nama_jenis' => $this->nama_Jenis,
        ]);
        Alert::success("Info", 'Berhasil Di Edit');
        $this->editJenis = false;
        $this->addJenis = false;
    }
    public function hapusJenis($id)
    {
        Jenis::find($id)->delete();
        $this->hapusJenis = false;
    }
    public function tambahKatalog($id)
    {
        $this->dataKatalog = Katalog::where('jenis_id', $id)->get();
        $this->itemID = $id;
        $this->addKatalog = true;
    }
    public function createModalKtalog()
    {
        $this->itemKatalog = true;
    }
    public function createKatalog()
    {
        Katalog::create([
            'jenis_id'=> $this->itemID,
            'nama_katalog'=> $this->nama_katalog,
        ]);
        $this->itemKatalog = false;
        Alert::success('Info', 'Berhasil Di Tambah');
    }
    public function hapusKatalog($id)
    {
        Katalog::find($id)->delete();
        $this->addKatalog = false;
        $this->itemKatalog = false;
        Alert::success('Info', 'Berhasil Di Hapus');
    }
}
