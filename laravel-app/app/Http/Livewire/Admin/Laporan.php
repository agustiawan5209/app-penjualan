<?php

namespace App\Http\Livewire\Admin;

use Alert;
use App\Models\Pembayaran;
use App\Models\Transaksi;
use Livewire\Component;

class Laporan extends Component
{
    public $openLaporan = false;
    public $startDate = "", $maxDate = "";
    public function render()
    {
        $pembayaran = Transaksi::whereHas('pembayaran', function ($query) {
            $query->whereIn('payment_status', [2, 3]);
        })->get();
        if ($this->startDate != null && $this->maxDate != null) {
            $pembayaran = Transaksi::whereBetween('tgl_transaksi', [$this->startDate, $this->maxDate])
                ->whereHas('pembayaran', function ($query) {
                    $query->whereIn('payment_status', [2, 3]);
                })->get();
        }
        return view('livewire.admin.laporan', [
            'transaksis' => $pembayaran,
        ]);
    }
    public function OpenLaporan()
    {
        Alert::info('info', 'berhasil');
        $this->openLaporan = true;
    }
}
