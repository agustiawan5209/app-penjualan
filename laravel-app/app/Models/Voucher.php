<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    protected $table = 'vouchers';
    protected $fillable = [
        'kode_voucher','promo_nominal','promo_persen','max_user','use_user','tgl_mulai','tgl_kadaluarsa'
    ];
}
