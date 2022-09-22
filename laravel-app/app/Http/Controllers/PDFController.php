<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class PDFController extends Controller
{
    public function invoice()
    {
        // dd(session('keranjang'));
        $data = session('keranjang');
        $pdf = Pdf::loadView('page.invoice.invoice', [ 'data'=> $data]);
        return $pdf->stream('invoice.pdf');
    }
    public function LaporanPenjualan($start, $end){
        $bayar = Transaksi::with(['pembayaran', 'pembayaran.user', 'barang'])->whereBetween('tgl_transaksi', [$start, $end])->get();
        $pdf = Pdf::loadView('page.invoice.pdf', [ 'data'=> $bayar]);
        return $pdf->stream('Penjualan.pdf');
    }
}
