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
        $notif_bayar = Pembayaran::all();

        // return $data;
        return view('livewire.admin.dashboard', compact('name', 'notif_user', 'notif_bayar'),[
            'penjualan'=> $this->penjualan(),
            'user_use'=> $this->user_use(),
            'jm_barang'=> $this->barang(),
        ]);
    }

    public function read($id){
        User::find($id)->notifications()->delete();
    }
    public function readBayar($id){
        Pembayaran::find($id)->notifications()->delete();
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
