<?php

namespace App\Http\Livewire\Admin;

use Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Barang;
use App\Models\Pembayaran;
use App\Models\Transaksi;
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
        $notif_user = User::all();

        // return $data;
        return view('livewire.admin.dashboard', compact('name', 'notif_user'),[
            'penjualan'=> $this->penjualan(),
            'user_use'=> $this->user_use(),
            'jm_barang'=> $this->barang(),
        ]);
    }

    public function read($id){
        User::find($id)->unreadNotifications()->update(['read_at' => now()]);
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
