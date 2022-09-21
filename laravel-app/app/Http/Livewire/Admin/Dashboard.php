<?php

namespace App\Http\Livewire\Admin;

use Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Barang;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{
    public function mount()
    {
        abort_if(Auth::check() == false, 401);
    }
    public function render()
    {
        $name = Auth::user()->name;
        // $data = $this->SetDataChart()
        $notif_user = auth()->user()->unreadNotifications ?? [];

        // return $data;
        return view('livewire.admin.dashboard', compact('name', 'notif_user'));
    }
}
