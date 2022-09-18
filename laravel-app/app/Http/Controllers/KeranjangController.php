<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use App\Models\Barang;
use App\Models\Keranjang;
use App\Models\UsesUserPromo;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreKeranjangRequest;
use App\Http\Requests\UpdateKeranjangRequest;

class KeranjangController extends Controller
{
    public function GetPromo()
    {
        $arr = [];
        // $barang = Barang::find($id_barang);
        $user_promo = UsesUserPromo::where('user_id', Auth::user()->id)->where('status', '=','0')->get();
        // dd($user_promo);
        foreach ($user_promo as $item) {
            $promo = Promo::where('id', $item->promo_id)->get();
            foreach ($promo as $data) {
                $arr[] = $data->id;
            }
        }
        $count = count($arr);
        $hasil = [];
        for ($i = 0; $i < $count; $i++) {
            $cek = Promo::where('id', $arr[$i])->get();
            foreach ($cek as $item) {
                if ($item->promo_persen != null) {
                    $hasil[] = $item->promo_persen;
                }

                // $hasil = [$barang_promo, $kategori_promo, $promo_kosong];
            }
        }
        // dd($hasil);
        if ($hasil == null) {
            $param = 0;
        } else {
            $param = array_sum($hasil);
        }
        // dd($param);
        return $param;
    }
    public function GetPromoNominal()
    {
        $arr = [];
        // $barang = Barang::find($id_barang);
        $user_promo = UsesUserPromo::where('user_id', Auth::user()->id)->where('status', '=','0')->get();
        foreach ($user_promo as $item) {
            $promo = Promo::where('id', $item->promo_id)->get();
            foreach ($promo as $data) {
                $arr[] = $data->id;
            }
        }
        $count = count($arr);
        $hasil = [];
        for ($i = 0; $i < $count; $i++) {
            $cek = Promo::where('id', $arr[$i])->get();
            foreach ($cek as $item) {
                if ($item->promo_nominal != null) {
                    $hasil[] =  $item->promo_nominal;
                }
                // if ($item->category_id == $barang->categories) {
                //     $hasil[] = $item->promo;
                // }
                // $hasil = [$barang_promo, $kategori_promo, $promo_kosong];
            }
        }
        // dd($arr);
        if ($hasil == null) {
            $param = 0;
        } else {
            $param = array_sum($hasil);
        }
        return $param;
    }
}
