<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;
use App\Models\Keranjang;

class TransaksiController extends Controller
{
    public function receive(){
       $cart = Keranjang::all();
    //    \Cart::clear();
       return $cart;
    }
}
