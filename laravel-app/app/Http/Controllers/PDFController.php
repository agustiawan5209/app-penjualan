<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function invoice(){
        dd(session('keranjang'));
    }
}
