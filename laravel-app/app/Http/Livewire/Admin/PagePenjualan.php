<?php

namespace App\Http\Livewire\Admin;

use App\Models\Pembayaran;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class PagePenjualan extends Component
{
    public $search = '';
    public $row = 10;
    public $order = 'desc';
    public $filter = 'all';
    public $item;
    public $deleteItem = false, $detail_transaksi = false;
    public function konfirmasiModal($id)
    {
        $this->item = $id;
        $this->deleteItem = true;
    }
    public function konfirmasi($id)
    {
        Pembayaran::find($id)->update(['payment_status' => '2']);
        Alert::success('Info', 'Pembayaran Berhasil Di Ganti');
        $this->deleteItem = false;
    }

    public function render()
    {
        $bayar = Pembayaran::orderBy('id', $this->order)->paginate($this->row);
        if ($this->search != '') {
            $bayar = Pembayaran::orderBy('id', $this->order)
                ->orWhere('number', 'like', '%' . $this->search . '%')
                ->orWhere('number', 'like', '%' . $this->search . '%')
                ->orWhere('payment_type', 'like', '%' . $this->search . '%')
                ->orWhere('total_price', 'like', '%' . $this->search . '%')
                ->orWhere('transaksi_id', 'like', '%' . $this->search . '%')

                ->paginate($this->row);
        }else if ($this->filter != 'all') {
            $bayar = Pembayaran::where('payment_status', '=', '' . $this->filter . '')->paginate($this->row);
        }else if($this->search == "" || $this->filter == "all"){
            $bayar = Pembayaran::orderBy('id', $this->order)->paginate($this->row);
        }

        return view('livewire.admin.page-penjualan', [
            'bayar' => $bayar,
        ]);
    }

    public function detailItem($id){

        return redirect()->route('detail-item-transaksi', ['idItem'=> $id])->with('toast_success', 'Detail Pembayaran!');
    }
}
