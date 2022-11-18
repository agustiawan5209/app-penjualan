<?php

namespace App\Http\Livewire\Item;

use App\Models\User;
use Livewire\Component;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;

class NotificationMenu extends Component
{
    public $notif = false;
    // public $notif_user;
    public function render()
    {
        sleep(0);
        $name = Auth::user()->name;
        // $data = $this->SetDataChart()
        $notif_user = User::all();
        $notif_bayar = Pembayaran::all();


        // dd($notif_user->notifications());
        return view('livewire.item.notification-menu',compact('name', 'notif_user', 'notif_bayar'));
    }
    public function read($id){
        User::find($id)->notifications()->delete();
    }
    public function readBayar($id){
        Pembayaran::find($id)->notifications()->delete();
    }
    public function clearall(){
        $user = User::all();
        foreach($user as $item){
           $item->notifications()->delete();
        }
        $Pembayaran = Pembayaran::all();
        foreach($Pembayaran as $item){
           $item->notifications()->delete();
        }
    }

    public function penjualan(){
        $tr =0;
        $tr = Pembayaran::where('payment_status', '=','2')->sum('total_price');
        return $tr;
    }
    public function user_use(){
        $tr =0;
        $tr = User::where('role_id', '!=', '1')->get();
        return $tr->count();
    }
    public function barang(){
        $tr =0;
        $tr = Barang::all();
        return $tr->count();
    }
}
