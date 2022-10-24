<?php

namespace App\Http\Livewire\Admin;

use App\Models\Jenis;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PageJenis extends Component
{
    // itemJenis
    public $addJenis = false,
        $editJenis = false,
        $hapusJenis = false;
    // field tabel jenis;
    public $nama_Jenis, $gambar_jenis;
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
        $this->itemID = $jenis->id;
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
            'gambar_jenis' => ['required', 'image'],
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
        }
        Jenis::where('id', $id)->update([
            'gambar' => $nama,
            'nama_jenis' => $this->nama_Jenis,
        ]);
        Alert::success("Info", 'Berhasil Di Edit');
        $this->editJenis = false;
    }
    public function hapusJenis($id)
    {
        Jenis::find($id)->delete();
        $this->hapusJenis = false;
    }
}
