<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Promo;
use App\Models\Diskon;
use App\Http\Requests\StoreDIskonRequest;
use App\Http\Requests\UpdateDIskonRequest;

class DiskonController extends Controller
{
    public function getDiskon()
    {
        $today = Carbon::now()->format("Y-m-d");
        $diskon = Diskon::whereDate('tgl_kadaluarsa', $today)->get();
        foreach ($diskon as $key => $value) {
            $data =  Diskon::find($value->id)->delete();
        }
        $Promo = Promo::whereDate('tgl_kadaluarsa', $today)->get();
        foreach ($Promo as $key => $value) {
            $data =  Promo::find($value->id)->update([
                'status'=> '1',
            ]);
        }
    }
}
