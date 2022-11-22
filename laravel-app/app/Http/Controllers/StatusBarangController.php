<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\Pembayaran;
use App\Models\StatusBarang;
use Illuminate\Http\Request;
use App\Http\Livewire\Pesanan;

class StatusBarangController extends Controller
{
    public function chart()
    {
        $carbon = Carbon::now()->parse();
        $year = $carbon->toArray();

        $transaksi = [];
        // $januari =
        for ($i = 1; $i < 13; $i++) {
            $potongan = Transaksi::where('status', '=', '0')
            ->whereYear('created_at', $year['year'])
            ->whereMonth('created_at', '' . $i . '')
            ->sum('potongan');
            $total = Transaksi::where('status', '=', '0')
            ->whereYear('created_at', $year['year'])
            ->whereMonth('created_at', '' . $i . '')
            ->sum('total');
            $transaksi[$i] = $total - $potongan;
        }
        return response()->json($transaksi);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StatusBarang  $statusBarang
     * @return \Illuminate\Http\Response
     */
    public function show(StatusBarang $statusBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StatusBarang  $statusBarang
     * @return \Illuminate\Http\Response
     */
    public function edit(StatusBarang $statusBarang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StatusBarang  $statusBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StatusBarang $statusBarang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StatusBarang  $statusBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatusBarang $statusBarang)
    {
        //
    }
}
