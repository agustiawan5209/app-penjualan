<?php

namespace App\Http\Livewire\Admin\Laporan;

use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\BarangKeluar as ModelsBarangKeluar;

class BarangKeluar extends Component
{
    public $openLaporan = false;
    public $startDate = "", $maxDate = "";
    public function render()
    {
        $barang = ModelsBarangKeluar::all();
        if($this->startDate != null && $this->maxDate != null){
            $barang = ModelsBarangKeluar::whereBetween('tgl_transaksi', [$this->startDate, $this->maxDate])->get();
            // dd($barang);
        }
        return view('livewire.admin.laporan.barang-keluar',[
            'barang'=> $barang,
        ]);
    }
    public function OpenLaporan(){
        Alert::info('info', 'berhasil');
        $this->openLaporan = true;
    }
}
