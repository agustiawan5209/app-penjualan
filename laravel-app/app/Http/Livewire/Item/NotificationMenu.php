<?php

namespace App\Http\Livewire\Item;

use App\Models\User;
use Livewire\Component;

class NotificationMenu extends Component
{
    public $notif = false;
    public function render()
    {
        // sleep(0);
        $user = User::all();
        // dd($user->notifications );

        return view('livewire.item.notification-menu' ,[
            'user'=> $user,
        ]);
    }
    public function notify(){
        return $this->notif = true;
    }
}
