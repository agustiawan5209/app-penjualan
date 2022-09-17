<?php

namespace App\Http\Livewire\Admin;

use Alert;
use Livewire\Component;

class Laporan extends Component
{
    public $openLaporan = false;
    public function render()
    {
        return view('livewire.admin.laporan');
    }
    public function OpenLaporan(){
        Alert::info('info', 'berhasil');
        $this->openLaporan = true;
    }
}
