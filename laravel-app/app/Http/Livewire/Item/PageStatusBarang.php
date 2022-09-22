<?php

namespace App\Http\Livewire\Item;

use App\Models\Ongkir;
use App\Models\StatusBarang;
use Livewire\Component;

class PageStatusBarang extends Component
{
    public $status = false;
    public $barang_id;
    public $ongkir_id;
    public $ongkir_status;
    public function mount($barang_id, $ongkir_id, $status){
        $this->barang_id= $barang_id;
        $this->ongkir_id= $ongkir_id;
        $this->status= $status;
    }
    public function render()
    {
        $ongkir =Ongkir::where('id', $this->ongkir_id)->first();
        $status_ongkir = StatusBarang::with('ongkir')->where('ongkir_id', '=', $ongkir->id)->get();
// dd($ongkir->status);
// $this->ongkir_status= $ongkir->status;
        return view('livewire.item.page-status-barang',[
            'status_ongkir'=> $status_ongkir,

        ]);
    }
    public function status($id)
    {
        $ongkir = Ongkir::where('id', '=', $id)->first();
        $ongkir->update([
            'status' => $this->status,
        ]);
        $msg = $this->ket;
        if ($this->ket == null) {
            if ($this->status == 1) {
                $msg = 'Belum Terkirim';
            } elseif ($this->status == 2) {
                $msg = 'Dalam Pengiriman';
            } elseif ($this->status == 3) {
                $msg = 'Pesanan Diterima Oleh Pembeli';
            }
        }
        StatusBarang::create([
            'ongkir_id' => $ongkir->id,
            'ket' => $msg,
        ]);
        session()->flash('message', $ongkir ? 'Berhasil Di Update' : 'Gagal Di Update');
        $this->status = false;
    }
}
