<?php

namespace App\Http\Livewire\Item;

use Carbon\Carbon;
use App\Models\Ongkir;
use Livewire\Component;
use App\Models\Pembayaran;
use App\Models\StatusBarang;
use RealRashid\SweetAlert\Facades\Alert;

class PagePengiriman extends Component
{
    public $status = false;
    public $row= 10,$search = '', $order = 'asc';
    public $itemID;
    public $itemDetail = false;
    public $ongkirItem = false;
    public $hapusItem = false;
    public $statusItem = false, $StatusEditItem = false, $ongkir_status;
    public $ItemID;
    public $tgl_pengiriman, $harga, $kode_pos, $kabupaten, $detail_alamat, $transaksi_id, $item_details;
    public $user;
    public $ket, $post;
    public function render()
    {
        $ongkir = Ongkir::orderBy('id', $this->order)
        ->whereNotNull('tgl_pengiriman')
        ->paginate($this->row);
        return view('livewire.item.page-pengiriman', compact('ongkir'));
    }
    public function lihatStatus($id){
        $ongkir = Ongkir::find($id);
        $this->itemID = $id;
        $this->statusItem = true;
        $this->ongkir_status = $ongkir->status;

    }
    public function tglPengiriman()
    {
        $carbon = Carbon::now()->format('Y-m-d');
        $ongkir = Ongkir::all();
        foreach ($ongkir as $item) {
           if($item->status == 1){
            Ongkir::where('tgl_pengiriman', '=', $carbon)->update([
                'status' => '2',
            ]);
           }
        }
    }
     /**
     * detailOngkir
     * Detail Ongkir
     * @param  mixed $transaksi_id
     * @return void
     */
    public function detailOngkir($transaksi_id)
    {
        $ongkir = Ongkir::where('id', '=', $transaksi_id)->get();

        foreach ($ongkir  as $item) {
            $this->kode_pos = $item->kode_pos;
            $this->kabupaten = $item->kabupaten;
            $this->detail_alamat = $item->detail_alamat;
            $this->transaksi_id = $item->transaksi_id;
            $this->tgl_pengiriman = $item->tgl_pengiriman;
            $this->harga = $item->harga;
            $this->status = $item->status;
            $payment = Pembayaran::where('transaksi_id', '=', $item->transaksi_id)->get();
            foreach ($payment as $item) {
                $this->item_details = $item->item_details;
            }
        }
        $this->itemDetail = true;
    }
    /**
     * editModal
     * Edit Ongkir
     * @param  mixed $id
     * @return void
     */
    public function editModal($id)
    {
        $ongkir = Ongkir::where('id', '=', $id)->get();

        foreach ($ongkir  as $item) {
            $this->ItemID = $item->id;
            $this->kode_pos = $item->kode_pos;
            $this->kabupaten = $item->kabupaten;
            $this->detail_alamat = $item->detail_alamat;
            $this->transaksi_id = $item->transaksi_id;
            $this->tgl_pengiriman = $item->tgl_pengiriman;
            $this->harga = $item->harga;
            $this->status = $item->status;
            $payment = Pembayaran::where('transaksi_id', '=', $item->transaksi_id)->get();
            foreach ($payment as $item) {
                $this->item_details = $item->item_details;
            }
        }

    }

    /**
     * edit
     * Konfirmasi Tanggal Pengiriman
     * @param  mixed $id
     * @return void
     */
    public function  edit($id)
    {
        $this->validate([
            'tgl_pengiriman' => 'required|date',
            'harga' => "required",
            'status' => "required",
        ]);
        $ongkir = Ongkir::where('id', '=', $id)->update([
            'tgl_pengiriman' => $this->tgl_pengiriman,
            'harga' => $this->harga,
            'status' => $this->status,
        ]);
        session()->flash('message', $ongkir ? 'Berhasil Di Update' : 'Gagal Di Update');
        $this->ongkirItem = false;
    }
    public function deleteModal($id)
    {
        $ongkir = Ongkir::where('id', '=', $id)->get();

        foreach ($ongkir  as $item) {
            $this->user = $item->payment->user->name;
            $this->ItemID = $item->id;
            $this->transaksi_id = $item->transaksi_id;
        }

        $this->hapusItem = true;
    }
    public function delete($id)
    {
        $ongkir = Ongkir::where('id', '=', $id)->delete();
        session()->flash("message", 'Berhasil DIhapus');
        $this->hapusItem = false;
    }

    public function gantiStatus($id)
    {
        $ongkir = Ongkir::where('id', '=', $id)->first();
        // foreach ($ongkir as $item) {
            $this->ItemID = $ongkir->id;
            $this->status = $ongkir->status;
        // }
        $this->post = StatusBarang::where('ongkir_id', '=', $this->ItemID)->get();

        // dd($this->post);
        $this->StatusEditItem = true;

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
        Alert::success('message','Berhasil Di Update' );
        $this->StatusEditItem = false;
    }
}
