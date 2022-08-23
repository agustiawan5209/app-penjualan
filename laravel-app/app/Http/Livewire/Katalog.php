<?php

namespace App\Http\Livewire;

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
        return view('livewire.katalog', [
            'title'=> $this->title
        ]);
    }
}
