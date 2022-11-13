<?php

namespace App\Http\Livewire;

use App\Models\Jenis;
use Livewire\Component;

class Katalog extends Component
{
    public $title;

    public function mount($title)
    {
        $this->title = $title;
    }
    public function render()
    {
        $jenis =Jenis::all();
        return view('livewire.katalog', [
            'title'=> $this->title,
            'jenis'=> $jenis,
        ]);
    }
    public function showMore(){
        $this->show = 20;
    }
}
