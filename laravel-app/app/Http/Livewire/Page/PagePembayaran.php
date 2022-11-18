<?php

namespace App\Http\Livewire\Page;

use Carbon\Carbon;
use App\Models\Bank;
use App\Models\Promo;
use Livewire\Component;
use App\Models\Keranjang;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\KeranjangController;
use App\Models\UsesUserPromo;
use RealRashid\SweetAlert\Facades\Alert;

class PagePembayaran extends Component
{
    public $kode_promo;

    public function mount(){
        if(!session()->has('keranjang')){
            abort(401);
        }
    }
    public function render()
    {
        $data = session('keranjang');
        // dd($data);
        $potongan_promo_persen = $this->PotonganPromoPersen();
        $potongan_promo_nominal = $this->PotonganPromoNominal();
        $arr_persen = [$potongan_promo_persen];
        $arr_nominal = [$potongan_promo_nominal];
        $potongan_persen = $this->hitungPotonganPersen($arr_persen, $data['total_bayar']);
        $potongan_nominal = $this->hitungPotonganNominal($arr_nominal);
        $total_potongan = array_sum([$potongan_persen, $potongan_nominal, $data['potongan']]);
        // dd($data);

        return view('livewire.page.page-pembayaran', [
            'cart'=> $data['item'],
            'potongan'=> $total_potongan,
            'sub_total'=>$data['sub_total'],
            'total_bayar'=> $data['total_bayar'] - $total_potongan,
            'bank' => Bank::all(),
            'jenis'=> $data['jenis'],
        ])->layout('components.layout.pay');
    }

    public function PotonganPromoPersen(){
        $promoController  = new KeranjangController();
        return $promoController->GetPromo();

    }
    public function PotonganPromoNominal(){
        $promoController  = new KeranjangController();
        return $promoController->GetPromoNominal();
    }
    public function hitungPotonganPersen($data = [], $total){
        $jumlah_persen = array_sum($data);
        $total_b = $total * ($jumlah_persen / 100);
        return abs($total_b);
    }
    public function hitungPotonganNominal($data = []){
        $jumlah_nominal = array_sum($data);
        return $jumlah_nominal;
    }
    public function CekPromo()
    {
        // Alert::warning('11', '404');
        $this->cekKadaluarsaPromo();
        $cek_pengguna = false;
        // Mengecek Jumlah Maksimal user Pada Promo
        $max_user = Promo::where('kode_promo', '=', $this->kode_promo)->get();
        // dd($max_user);
        // Cek Max Pengguna User
        if ($max_user->count() > 0) {
            foreach ($max_user as $item) {
                $cek_pengguna_promo = UsesUserPromo::where('promo_id', '=', $item->id)->get();
                if ($cek_pengguna_promo->count() == $item->max_user) {
                    // Jika Pengguna Promo Sama Dengan Besar
                    $cek_pengguna = false;
                    Alert::info('message', 'Maaf Pengguna Promo Sudah Maksimal');
                } else if ($cek_pengguna_promo->count() < $item->max_user) {
                    // Jika Pengguna User Lebh Kecil
                    $cek_pengguna = true;
                }
            }
        }else{
            Alert::warning('Info', 'Kode Promo Salah');
        }
        // Cek Promo
        if ($cek_pengguna == true) {
            $promo = Promo::where('kode_promo', '=', $this->kode_promo)->first();
            if ($promo->count() > 0) {
                // Mencocokan Kode Promo
                $promo_user = UsesUserPromo::where('user_id', '=', Auth::user()->id)->where('status', '=', '1')->get();
                // Jika Gagal
                if ($promo_user->count() > 0) {
                    Alert::info('message', 'Maaf Promo Sudah Terpakai');
                } else {
                    // Jika Kode Promo Cocok Maka Menambahkan Ke promo User
                    $promo_user = UsesUserPromo::insert([
                        'user_id' => Auth::user()->id,
                        'promo_id' => $promo->id,
                        'status'=> '0'
                    ]);
                    $get_promo = Promo::find($promo->id);
                    if($get_promo->use_user == $get_promo->max_user){
                        Alert::info('message', 'Maaf Kode Promo Salah');
                    }else{

                        $count = $get_promo->use_user + 1;
                        Promo::where('id', $promo->id)->update([
                            'use_user' => $count
                        ]);
                        Alert::info('message', 'Selamat Menikmati Promo Yang Ada');
                    }
                }
            } else {
                Alert::info('message', 'Maaf Kode Promo Salah');
            }
        }
    }
    public function cekKadaluarsaPromo()
    {
        // Mengambil Tanggal
        $carbon = Carbon::now()->format('Y-m-d');
        $array_cek = [];
        // mengambil data promo
        $tgl_promo = Promo::whereDate('tgl_kadaluarsa', '<=', $carbon)->get();
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
