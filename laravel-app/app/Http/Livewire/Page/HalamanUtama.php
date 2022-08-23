<?php

namespace App\Http\Livewire\Page;

use Livewire\Component;

class HalamanUtama extends Component
{
    public function render()
    {
        return view('livewire.page.halaman-utama')->layout('layouts.guest');
    }
}
