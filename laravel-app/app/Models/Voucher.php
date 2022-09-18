<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    protected $table = 'vouchers';
    protected $fillable = ['kode_voucher','barang_id', 'max_user', 'use_user',  'diskon','deskripsi', 'jumlah_pembelian', 'jenis_voucher'];
    // protected $dates = ['deleted_at'];

    public function barang(){
        return $this->hasOne(Barang::class, 'id', 'barang_id');
    }
}
