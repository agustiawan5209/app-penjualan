<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Laporan extends Component
{
    public $openLaporan = false;
    public function render()
    {
        return view('livewire.admin.laporan');
    }
    public function OpenLaporan(){
        $this->openLaporan = true;
    }
}
