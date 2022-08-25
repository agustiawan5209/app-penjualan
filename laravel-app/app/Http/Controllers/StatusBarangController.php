<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\StatusBarang;
use Illuminate\Http\Request;

class StatusBarangController extends Controller
{
    public function chart()
    {
      $result = Barang::whereNotNull('updated_at')
                  ->orderBy('id', 'ASC')
                  ->get();
      return response()->json($result);
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
