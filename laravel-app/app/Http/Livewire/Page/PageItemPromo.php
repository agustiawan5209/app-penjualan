<?php

namespace App\Http\Livewire\Page;

use Carbon\Carbon;
use App\Models\Promo;
use App\Models\Voucher;
use Livewire\Component;
use App\Models\UsesUserVoucher;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PageItemPromo extends Component
{
    public function render()
    {
        $promo = Promo::where('status', '0')->get();
        $voucher = Voucher::all();
        $this->deleteVoucher();
        return view('livewire.page.page-item-promo', compact('promo', 'voucher'));
    }
    public function KlaimVoucher($id)
    {
        if(Auth::check()){
            $kadalursa = Carbon::now()->add(10, 'day');
        $voucher = UsesUserVoucher::where('user_id', Auth::user()->id)->where('voucher_id', $id)->get();
        if ($voucher->count() > 1) {
            Alert::error("Maaf", 'Voucher Telah Terpakai/Kadaluarsa');
        }else{
            UsesUserVoucher::create([
                'user_id'=> Auth::user()->id,
                'voucher_id'=> $id,
                'status'=> '2',
                'tgl_kadaluarsa'=> $kadalursa,
            ]);
            Alert::success("Selamat", 'Selamat Menikmati Voucher Anda');

        }
        }else{
            Alert::error('Maaf', 'Anda Harus Daftar/Masuk Terlebih dahulu');
        }
        return redirect()->route('Promo-Diskon')->with('message', 'Selamat Menikmati Voucher');
    }

    /**
     * deleteVoucher
     *  Jika TGL DAN WAKTU Sama Dengan Skrg;
     * @return void
     */
    public function deleteVoucher()
    {
        $carbon_hours = Carbon::now()->toTimeString();
        $carbon_date = Carbon::now()->format('Y-m-d');
        $voucher = UsesUserVoucher::all();
        foreach ($voucher as $user_voucher) {
            if ($carbon_date == $user_voucher->tgl_kadaluarsa || $carbon_hours == $user_voucher->waktu) {
                UsesUserVoucher::where('id', $user_voucher->id)->update(['status', '=', '4']);
            }
        }
    }
}
