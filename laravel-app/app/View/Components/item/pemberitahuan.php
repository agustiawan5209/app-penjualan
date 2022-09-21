<?php

namespace App\View\Components\item;

use App\Models\User;
use Illuminate\View\Component;

class pemberitahuan extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $notif_user = User::where('role_id', '=', '2')->get();
        return view('components.item.pemberitahuan',['notif_user'=> $notif_user->notifications]);
    }
}
