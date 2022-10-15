<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Promo;
use Illuminate\Http\Request;
use App\Models\UsesUserPromo;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreUsesUserPromoRequest;
use App\Http\Requests\UpdateUsesUserPromoRequest;

class UsesUserPromoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->cekKadaluarsaPromo();
    }
    public function CekPromoUser(Request $request)
    {
        $this->cekKadaluarsaPromo();
        $cek_pengguna = false;
        // Mengecek Jumlah Maksimal user Pada Promo
        $max_user = Promo::where('kode_promo', '=', $request->kode_promo)->get();
        // dd($max_user);
        // Cek Max Pengguna User
        if ($max_user->count() > 0) {
            foreach ($max_user as $item) {
                $cek_pengguna_promo = UsesUserPromo::where('promo_id', '=', $item->id)->get();
                $cek_pengguna = UsesUserPromo::where('promo_id', '=', $item->id)->first();
                if ($cek_pengguna_promo->count() == $item->max_user) {
                    // Jika Pengguna Promo Sama Dengan Besar
                    $cek_pengguna = false;
                    Alert::error('message', 'Maaf Pengguna Promo Sudah Maksimal');
                    return redirect()->back();
                } else if ($cek_pengguna_promo->count() < $item->max_user) {
                    // Jika Pengguna User Lebh Kecil
                    $cek_pengguna = true;
                }
            }
        }else{
            Alert::error('message', 'Promo Tidak Ada');
            return redirect()->back();
        }
        // Cek Promo
        if ($cek_pengguna == true) {
            $promo = Promo::where('kode_promo', '=', $request->kode_promo)->first();
            if ($promo->count() > 0) {
                // Mencocokan Kode Promo
                $promo_user = UsesUserPromo::where('user_id', '=', Auth::user()->id)->where('promo_id', '=', $promo->id)->where('status', '=', '1')->get();
                // Jika Gagal
                if ($promo_user->count() > 0) {
                    Alert::error('message', 'Maaf Promo Sudah Terpakai');
                    return redirect()->back();
                } else {
                    // Jika Kode Promo Cocok Maka Menambahkan Ke promo User
                    $promo_user = UsesUserPromo::insert([
                        'user_id' => Auth::user()->id,
                        'promo_id' => $promo->id,
                        'status'=> '1'
                    ]);
                    $get_promo = Promo::find($promo->id);
                    if($get_promo->use_user == $get_promo->max_user){
                        Alert::error('message', 'Maaf Kode Promo Salah');
                        return redirect()->back();
                    }else{

                        $count = $get_promo->use_user + 1;
                        Promo::where('id', $promo->id)->update([
                            'use_user' => $count
                        ]);
                        Alert::success('message', 'Selamat Menikmati Promo Yang Ada');
                        return redirect()->back();
                    }
                }
            } else {
                Alert::error('message', 'Maaf Kode Promo Salah');
                return redirect()->back();
            }
        }
    }
    public function cekKadaluarsaPromo()
    {
        // Mengambil Tanggal
        $carbon = Carbon::now()->format('Y-m-d');
        $array_cek = [];
        // mengambil data promo
        $tgl_promo = Promo::whereDate('tgl_kadaluarsa', $carbon)->get();
        if ($tgl_promo->count() > 0) {
            // foreach ($tgl_promo as $tgl_cek) {
            $promo_kadaluarsa = Promo::whereDate('tgl_kadaluarsa', $carbon)->get();
            foreach ($promo_kadaluarsa as $item) {
                if ($promo_kadaluarsa) {
                    $array_cek[] = 'Terhapus : ' . $item->id;
                    Promo::whereNull('deleted_at')->whereDate('tgl_kadaluarsa', $carbon)->delete();
                } else {
                    $array_cek[] = 'Tidak Terhapus : ' . $item->id;
                }
                // }
            }
        }
    }
}
