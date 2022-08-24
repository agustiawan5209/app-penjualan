<?php

namespace App\Http\Controllers;

use App\Models\DIskon;
use App\Http\Requests\StoreDIskonRequest;
use App\Http\Requests\UpdateDIskonRequest;

class DIskonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreDIskonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDIskonRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DIskon  $dIskon
     * @return \Illuminate\Http\Response
     */
    public function show(DIskon $dIskon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DIskon  $dIskon
     * @return \Illuminate\Http\Response
     */
    public function edit(DIskon $dIskon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDIskonRequest  $request
     * @param  \App\Models\DIskon  $dIskon
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDIskonRequest $request, DIskon $dIskon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DIskon  $dIskon
     * @return \Illuminate\Http\Response
     */
    public function destroy(DIskon $dIskon)
    {
        //
    }
}
