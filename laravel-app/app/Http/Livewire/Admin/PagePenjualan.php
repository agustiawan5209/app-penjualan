<?php

namespace App\Http\Livewire\Admin;

use App\Models\Barang;
use App\Models\Ongkir;
use App\Models\Pembayaran;
use App\Models\StatusBarang;
use Livewire\Component;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;

class PagePenjualan extends Component
{
    use WithPagination;
    public $search = '';
    public $row = 10;
    public $order = 'desc';
    public $filter = 'all';
    public $item;
    public $deleteItem = false, $detail_transaksi = false;
    // ongkir item
    public $tgl_pengiriman, $harga, $kode_pos, $kabupaten, $detail_alamat, $pdf_url,$status, $transaksi_id, $user_name, $item_details;
    public $produk, $jumlah ,$ket;
    public $ongkirItem = false;
    public function konfirmasiModal($id)
    {
        $this->item = $id;
        $this->deleteItem = true;
        $br = Pembayaran::find($id);
        $this->pdf_url= $br->pdf_url;
    }
    public function konfirmasi($id)
    {
        Pembayaran::find($id)->update(['payment_status' => '2']);
        Alert::success('Info', 'Pembayaran Berhasil Di Konfirmasi');
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
        $pembayaran = Pembayaran::find($id);

        return redirect()->route('Admin.Shop-detail', ['idItem'=> $pembayaran->transaksi_id])->with('toast_success', 'Detail Pembayaran!');
    }
    public function ongkirModal($id)
    {
        $payment = Pembayaran::where('id', '=', $id)->get();
        // dd($payment);
        foreach ($payment as $item) {
            $this->item_details = $item->item_details;
            $this->transaksi_id = $item->transaksi_id;
        }
        $ongkir =Ongkir::where('transaksi_id', '=', $this->transaksi_id)->get();
        foreach ($ongkir as $item) {
            $this->kode_pos = $item->kode_pos;
            $this->kabupaten = $item->kabupaten;
            $this->detail_alamat = $item->detail_alamat;
            $this->kabupaten = $item->kabupaten;
            $this->tgl_pengiriman = $item->tgl_pengiriman;
            $this->status = $item->status;
            // $this->harga = $item->harga;
            if ($this->kabupaten == 'Kota Kendari') {
                $this->harga = '12000';
            }
            if ( $this->kabupaten == 'Kendari') {
                $this->harga = '12000';
            }
        }
        $this->ongkirItem = true;
    }
    public function createOngkir()
    {
        $this->validate([
            'tgl_pengiriman' => ['required','date'],
            'harga' => ['required','numeric'],
            'status' => ['required','integer'],
        ]);
        if ($this->status == 0) {
            $this->status = '2';
        }
        // dd($this->harga);
        $ongkir =Ongkir::where('transaksi_id', '=', $this->transaksi_id)->first();
        if($this->harga != null){
            // dd($this->harga);
            $ongkir->update([
                'tgl_pengiriman' => $this->tgl_pengiriman,
                'harga' => $this->harga,
                'status' => $this->status,
            ]);
            $msg = $this->ket;
            if ($this->ket != null) {
                if ($this->status == 1) {
                    $msg = 'Belum Terkirim';
                } elseif ($this->status == 2) {
                    $msg = 'Dalam Pengiriman';
                } elseif ($this->status == 3) {
                    $msg = 'Pembayaran Di Konfirmasi';
                }
            }
            StatusBarang::create([
                'ongkir_id' => $ongkir->id,
                'ket' => $msg,
            ]);
            Alert::success("Berhasil", 'Pengiriman Berhasil Di Tambah');
        }else{
            Alert::warning("Gagal", 'Pengiriman Gagal Di Tambah');

        }
        $this->ongkirItem = false;
    }
}
