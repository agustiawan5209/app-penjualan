<?php

namespace App\Http\Livewire\Page;

use App\Models\Jenis;
use App\Models\Slide;
use Livewire\Component;

class HalamanUtama extends Component
{
    public $show = 5;
    public function render()
    {
        $jenis = Jenis::paginate($this->show);
        $slide = Slide::all();
        return view('livewire.page.halaman-utama', compact("jenis", 'slide'))->layout('layouts.guest');
    }
    public function showMore(){
        $this->show = $this->show + 5;
    }
}
