<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis';
    protected $fillable = ['ID_transaksi','tgl_transaksi','item_details', 'potongan', 'total', 'barang_id'];
    public function barang(){
        return $this->hasOne(Barang::class, 'id', 'barang_id');
    }
    public function pembayaran(){
        return $this->hasOne(Pembayaran::class, 'transaksi_id', 'ID_transaksi');
    }
}
