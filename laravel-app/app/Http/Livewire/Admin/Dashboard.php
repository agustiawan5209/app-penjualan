<?php

namespace App\Http\Livewire\Admin;

use Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public function mount(){
        abort_if(Auth::check() == false, 401);
    }
    public function render()
    {
        $name = Auth::user()->name;
        return view('livewire.admin.dashboard',
        compact('name')
    );
    }
}
