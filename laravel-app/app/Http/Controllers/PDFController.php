<?php

namespace App\Http\Controllers;

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
}
