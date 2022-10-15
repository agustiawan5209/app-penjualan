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
    public function LaporanPenjualan(Request $request){
        $bayar = Pembayaran::with(['transaksi', 'user'])->whereBetween('tgl_transaksi', [$request->start, $request->end])->get();
        if($request->start == "" && $request->end == ''){
            $bayar= Pembayaran::with(['transaksi', 'user'])->get();
        }
        $pdf = Pdf::loadView('page.invoice.pdf', [ 'data'=> $bayar]);
        return $pdf->stream('Penjualan.pdf');
    }
}
