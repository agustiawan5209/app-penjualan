<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pembayaran;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Pesanan extends Component
{
    use WithPagination;
    public $search = "", $row = 10, $order = 'asc';

    public function detailItem($id){
        $pembayaran = Pembayaran::find($id);

        return redirect()->route('detail-item-transaksi', ['idItem'=> $pembayaran->transaksi_id])->with('toast_success', 'Detail Pembayaran!');
    }
    public function render()
    {
        $bayar = Pembayaran::with(['ongkir', 'transaksi', 'user'])
        ->where('user_id', '=', Auth::user()->id)
        ->orderBy('id', $this->order)->paginate($this->row);

        if($this->search != null){
            $bayar = Pembayaran::where('user_id', '=', Auth::user()->id)
            ->with(['ongkir', 'transaksi', 'user'])
            ->where('nama', 'like', '%'. $this->search .'%')
            ->orWhere('number', 'like', '%'. $this->search .'%')
            ->orWhere('total_price', 'like', '%'. $this->search .'%')
            ->orWhere('nama', 'like', '%'. $this->search .'%')
            ->orderBy('id', $this->order)->paginate($this->row);
        }
        return view('livewire.pesanan',[
            'bayar'=>   $bayar ,
        ]);
    }
}
