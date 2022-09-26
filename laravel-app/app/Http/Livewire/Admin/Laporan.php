<?php

namespace App\Http\Livewire\Admin;

use Alert;
use App\Models\Pembayaran;
use App\Models\Transaksi;
use Livewire\Component;

class Laporan extends Component
{
    public $openLaporan = false;
    public $startDate, $maxDate;
    public function render()
    {
        $pembayaran = Pembayaran::all();
        if($this->startDate != null && $this->maxDate != null){
            $pembayaran = Pembayaran::whereBetween('tgl_transaksi', [$this->startDate, $this->maxDate])->get();

            // dd($pembayaran);
        }
        return view('livewire.admin.laporan',[
            'pembayaran'=> $pembayaran,
        ]);
    }
    public function OpenLaporan(){
        Alert::info('info', 'berhasil');
        $this->openLaporan = true;
    }
}
