<?php

namespace App\Http\Livewire\Admin;

use App\Models\Jenis;
use App\Models\Barang;
use App\Models\DIskon;
use App\Models\Satuan;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Alert;
use App\Models\Katalog;
use Storage;

class PageBarang extends Component
{
    use WithPagination;
    use WithFileUploads;
    // item Search Dan Row
    public $search = '',
        $row = 10,
        $order = 'asc';
    // Item FIeld Table
    // Barang
    public $katalog = [];
    public $dataKatalog = [];
    public $gambar, $kode_barang, $jenis_id, $satuan_id, $harga, $deskripsi, $tgl_perolehan, $itemID, $nama_barang, $stock;
    public $updateFoto, $gambar_jenis;

    public function render()
    {
        $barang = Barang::orderBy('id', $this->order)
            ->with(['satuan', 'jenis'])->paginate($this->row);
        if ($this->search != null) {
            $barang = Barang::where('kode_barang', 'like', '%' . $this->search . '%')
                ->orWhere('harga', 'like', '%' . $this->search . '%')
                ->orWhereDate('tgl_perolehan', 'like', '%' . $this->search . '%')
                ->orderBy('id', $this->order)
                ->with('satuan')
                ->with('jenis')
                ->paginate($this->row);
        }
        $jenis = Jenis::all();
        $satuan = Satuan::all();
        return view('livewire.admin.page-barang', compact('barang', 'satuan', 'jenis'));
    }

    /*
     * FUngsi Modal Barang
     * Edit Hapus Tambah
     */
    public $itemTambah = false,
        $itemHapus = false,
        $itemEdit = false,
        $itemDetail = false;
    public function closeModal()
    {
        $this->itemEdit = false;
        $this->itemHapus = false;
        $this->itemTambah = false;
        $this->itemID = null;
        $this->addItemDiskon = false;
    }
    public function TambahModal()
    {
        $this->itemTambah = true;
    }

    public function HapusModal($id)
    {
        $barang = Barang::find($id);
        $this->itemID = $barang->id;
        $this->itemHapus = true;
    }
    public function EditModal($id)
    {
        $this->katalog = [];
        $barang = Barang::find($id);
        $this->itemID = $barang->id;
        $this->updateFoto = $barang->gambar;
        $this->nama_barang = $barang->nama_barang;
        $this->jenis_id = $barang->jenis_id;
        $this->satuan_id = $barang->satuan_id;
        $this->harga = $barang->harga;
        $this->deskripsi = $barang->deskripsi;
        $this->tgl_perolehan = $barang->tgl_perolehan;
        $this->stock = $barang->stock;
        foreach ($barang->katalog as $item) {
            array_push($this->katalog, $item->nama_katalog);
        }
        $this->itemEdit = true;
    }

    public function DetailModal($id)
    {
        $barang = Barang::find($id);
        $this->itemID = $barang->id;
        $this->updateFoto = $barang->gambar;
        $this->nama_barang = $barang->nama_barang;
        $this->jenis_id = $barang->jenis->nama_jenis;
        $this->satuan_id = $barang->satuan->nama_satuan;
        $this->harga = $barang->harga;
        $this->deskripsi = $barang->deskripsi;
        $this->tgl_perolehan = $barang->tgl_perolehan;
        $this->stock = $barang->stock;
        // Ambil Katalog

        $this->dataKatalog = Katalog::where('barang_id', $id)->get();
        // dd($this->katalog);
        $this->itemDetail = true;
    }

    /*
     * Fungsi CRUD Barang
     */
    public function create()
    {
        $valid = $this->validate([
            'gambar' => 'image|max:2040',
            'nama_barang' => 'required',
            'jenis_id' => 'required',
            'satuan_id' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'tgl_perolehan' => 'required',
            'stock' => 'required',
        ]);
        // dd($this->katalog);

        $kode = Barang::max('kode_barang');
        if ($kode == null) {
            $book_id = 'PB-001';
        }
        // dd($kode);
        $huruf = 'PB';
        $urutan = (int) substr($kode, 3, 3);
        $urutan++;
        if ($urutan < 10) {
            $book_id = $huruf . '-00' . $urutan;
        } else {
            $book_id = $huruf . '-' . $urutan;
        }
        if ($this->gambar != null) {
            $nama = $this->gambar->getClientOriginalName();
            $random = bcrypt($nama) . '.' . $this->gambar->getClientOriginalExtension();
            $this->gambar->storeAs('upload/', $nama);
        }
        $barang = Barang::create([
            'gambar' => $nama,
            'kode_barang' => $book_id,
            'jenis_id' => $this->jenis_id,
            'nama_barang' => $this->nama_barang,
            'satuan_id' => $this->satuan_id,
            'harga' => $this->harga,
            'deskripsi' => $this->deskripsi,
            'tgl_perolehan' => $this->tgl_perolehan,
            'stock' => $this->stock,
        ]);
        for ($i = 0; $i < count($this->katalog); $i++) {
            Katalog::create([
                'barang_id' => $barang->id,
                'nama_katalog' => $this->katalog[$i],
            ]);
        }
        Alert::info('message', 'Berhasil Ditambah');
        $this->itemTambah = false;
        $this->gambar = null;
        $this->katalog = [];
        $this->deskripsi = null;
        $this->nama_barang = null;
        $this->tgl_perolehan = null;
        $this->jumlah_diskon = null;
        $this->jenis_id = null;
        $this->satuan_id = null;
    }
    public function edit($id)
    {
        $valid = $this->validate([
            // 'gambar' => 'image|max:2040',
            // 'kode_barang'=> 'required',
            'nama_barang' => 'required',
            'jenis_id' => 'required',
            'satuan_id' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'tgl_perolehan' => 'required',
            'stock' => 'required',
        ]);
        $random = $this->updateFoto;
        if ($this->gambar != null) {
            $nama = $this->gambar->getClientOriginalName();
            $random = bcrypt($nama) . '.' . $this->gambar->getClientOriginalExtension();
            $this->gambar->storeAs('upload', $random);
        }
        $barang = Barang::where('id', $id)->update([
            'gambar' => $random,
            // 'kode_barang' => $this->kode_barang,
            'jenis_id' => $this->jenis_id,
            'satuan_id' => $this->satuan_id,
            'harga' => $this->harga,
            'deskripsi' => $this->deskripsi,
            'tgl_perolehan' => $this->tgl_perolehan,
            'stock' => $this->stock,
        ]);
        for ($i = 0; $i < count($this->katalog); $i++) {
            Katalog::create([
                'barang_id' => $id,
                'nama_katalog' => $this->katalog[$i],
            ]);
        }
        $this->itemEdit = false;
        Alert::info('message', 'Berhasil Di Edit');
    }
    public function delete($id)
    {
        Barang::find($id)->delete();
        Alert::success('info', 'Berhasil Di Hapus');
        $this->itemHapus = false;
    }

    // Crud Jenis
    // itemJenis
    public $addJenis = false,
        $editJenis = false,
        $hapusJenis = false;
    // field tabel jenis;
    public $nama_Jenis;
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

    // Satuan
    // Crud Satuan
    // itemSatuan
    public $addSatuan = false,
        $editSatuan = false,
        $hapusSatuan = false;
    // field tabel Satuan;
    public $nama_Satuan;
    public function tambahSatuan()
    {
        $this->addSatuan = true;
    }
    public function editSatuanModal($id)
    {
        $Satuan = Satuan::find($id);
        $this->nama_Satuan = $Satuan->nama_Satuan;
        $this->editSatuan = true;
    }
    public function hapusSatuanModal($id)
    {
        $Satuan = Satuan::find($id);
        $this->itemID = $Satuan->id;
    }

    public function createSatuan()
    {
        Satuan::create([
            'nama_Satuan' => $this->nama_Satuan,
        ]);
        $this->addSatuan = false;
    }
    public function editSatuan($id)
    {
        Satuan::where('id', $id)->update([
            'nama_Satuan' => $this->nama_Satuan,
        ]);
        $this->editSatuan = false;
    }
    public function hapusSatuan($id)
    {
        Satuan::find($id)->delete();
        $this->hapusSatuan = false;
    }

    /**
     * Fungsi Update Diskom
     */
    public $itemKatalog;
    // item field table DISKON
    // public $itemID;
    public $jumlah_diskon, $tgl_kadaluarsa, $tgl_mulai, $barang_id;
    public $addItemDiskon, $edit;
    public function TambahModalDiskon($id)
    {
        $this->addItemDiskon = true;
        $this->itemID = $id;
    }
    public function EditModalDiskon($id)
    {
        $diskon = DIskon::find($id);
        $this->edit = $diskon->barang_id;
        $this->jumlah_diskon = $diskon->jumlah_diskon;
        $this->tgl_kadaluarsa = $diskon->tgl_kadaluarsa;
        $this->tgl_mulai = $diskon->tgl_mulai;
        $this->addItemDiskon = true;
    }
    public function HapusModalDiskon($id)
    {
        $diskon = DIskon::find($id);
        $this->itemID = $diskon->id;
        $this->hapusItem = true;
    }

    // CRUD TABEL DISKON
    public function createDiskon($barang_id)
    {
        $valid = $this->validate([
            // 'barang_id' => 'required',
            'jumlah_diskon' => 'required',
            'tgl_mulai' => 'required',
            'tgl_kadaluarsa' => 'required',
        ]);
        // $data = array_push($barang_id, $valid);
        // dd($valid);
        $diskon = DIskon::create([
            'barang_id' => $barang_id,
            'jumlah_diskon' => $this->jumlah_diskon,
            'tgl_mulai' => $this->tgl_mulai,
            'tgl_kadaluarsa' => $this->tgl_kadaluarsa,
        ]);
        Alert::success('message', 'Berhasil Di Tambah');
        $this->closeModal();
    }
    public function editDiskon($id)
    {
        $valid = $this->validate([
            // 'barang_id' => 'required',
            'jumlah_diskon' => 'required',
            'tgl_mulai' => 'required',
            'tgl_kadaluarsa' => 'required',
        ]);

        $diskon = DIskon::where('id', $id)->update([
            'jumlah_diskon' => $this->jumlah_diskon,
            'tgl_mulai' => $this->tgl_mulai,
            'tgl_kadaluarsa' => $this->tgl_kadaluarsa,
        ]);
        $this->addItemDiskon = false;
        Alert::success('message', 'Berhasil Di Edit');
    }
    public function deleteDiskon($id)
    {
        DIskon::where('id', $id)->delete();
        Alert::success('message', 'Berhasil Di Hapus');
        $this->hapusItem = false;
    }
}
