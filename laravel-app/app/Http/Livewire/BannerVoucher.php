<?php

namespace App\Http\Livewire;

use App\Models\Voucher;
use Livewire\Component;
use App\Models\UsesUserVoucher;
Use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BannerVoucher extends Component
{
    public function render()
    {
        $carbon_hours = Carbon::now()->toTimeString();
        $carbon_date = Carbon::now();
        $this->deleteVoucher();
        $voucher = UsesUserVoucher::where('user_id', Auth::user()->id)->get();
        return view('livewire.banner-voucher', [
            'UsesUserVoucher'=> $voucher,
            'carbon_hours'=> $carbon_hours,
            'carbon_date'=> $carbon_date,
        ]);
    }
    public function KlaimVoucher($id)
    {
        UsesUserVoucher::where('id', $id)->update(['status'=> '2']);
        Alert::success('info', 'Selemat Menikmati Voucher');
        return redirect()->route('home')->with('message', 'Selamat Menikmati Voucher');
    }

    /**
     * deleteVoucher
     *  Jika TGL DAN WAKTU Sama Dengan Skrg;
     * @return void
     */
    public function deleteVoucher(){
        $carbon_hours = Carbon::now()->toTimeString();
        $carbon_date = Carbon::now()->format('Y-m-d');
        $voucher = UsesUserVoucher::all();
        foreach($voucher as $user_voucher){
            if($carbon_date == $user_voucher->tgl_kadaluarsa && $carbon_hours == $user_voucher->waktu){
                UsesUserVoucher::where('id', $user_voucher->id)->update(['status','=', '4']);
            }
        }
    }
}
