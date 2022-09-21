<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsesUserVoucher extends Model
{
    use HasFactory;
    protected $table= 'uses_user_vouchers';
    protected $fillable= ['user_id', 'voucher_id','status'];
    protected $hidden = ['status'];

    public function voucher(){
        return $this->hasOne(Voucher::class, 'id', 'voucher_id');
    }
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
