<?php

namespace App\Http\Livewire\Item;

use App\Models\User;
use Livewire\Component;

class NotificationMenu extends Component
{
    public $notif = false;
    // public $notif_user;
    public function render()
    {
        sleep(0);
        $notif_user = User::all();

        // dd($notif_user->notifications());
        return view('livewire.item.notification-menu',['notif_user'=> $notif_user]);
    }
}
