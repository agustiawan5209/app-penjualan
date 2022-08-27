<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;

class TransaksiController extends Controller
{
    public function receive(){
       $cart = \Cart::getContent();
    //    \Cart::clear();
       return $cart;
    }
}
