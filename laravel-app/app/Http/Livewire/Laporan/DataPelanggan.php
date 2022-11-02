<?php

namespace App\Http\Livewire\Laporan;

use Livewire\Component;
use App\Models\Pembayaran;
use RealRashid\SweetAlert\Facades\Alert;

class DataPelanggan extends Component
{
    public $openLaporan = false;
    public $startDate = "", $maxDate = "";
    public function render()
    {
        $pembayaran = Pembayaran::all();
        if($this->startDate != null && $this->maxDate != null){
            $pembayaran = Pembayaran::whereBetween('tgl_transaksi', [$this->startDate, $this->maxDate])->get();
            // dd($pembayaran);
        }
        return view('livewire.laporan.data-pelanggan',[
            'pembayaran'=> $pembayaran,
        ]);
    }
    public function OpenLaporan(){
        Alert::info('info', 'berhasil');
        $this->openLaporan = true;
    }
}
