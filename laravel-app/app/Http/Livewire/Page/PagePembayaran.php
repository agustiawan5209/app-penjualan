<?php

namespace App\Http\Livewire\Page;

use Livewire\Component;
use App\Models\Keranjang;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\KeranjangController;

class PagePembayaran extends Component
{
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
        // dd($total_potongan);
        return view('livewire.page.page-pembayaran', [
            'cart'=> Keranjang::with(['barang.jenis','barang.satuan','barang.katalog'])->where('user_id', Auth::user()->id)->get(),
            'potongan'=> $total_potongan,
            'sub_total'=>$data['sub_total'],
            'total_bayar'=> $data['total_bayar'] - $total_potongan,
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
}
