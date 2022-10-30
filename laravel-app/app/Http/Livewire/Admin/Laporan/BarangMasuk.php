<?php

namespace App\Http\Livewire\Admin\Laporan;

use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\BarangMasuk as ModelsBarangMasuk;

class BarangMasuk extends Component
{
    public $openLaporan = false;
    public $startDate = "", $maxDate = "";
    public function render()
    {
        $barang = ModelsBarangMasuk::all();
        if($this->startDate != null && $this->maxDate != null){
            $barang = ModelsBarangMasuk::whereBetween('tgl_transaksi', [$this->startDate, $this->maxDate])->get();
            // dd($barang);
        }
        return view('livewire.admin.laporan.barang-masuk',[
            'barang'=> $barang,
        ]);
    }
    public function OpenLaporan(){
        Alert::info('info', 'berhasil');
        $this->openLaporan = true;
    }
}
