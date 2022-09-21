<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ongkir extends Model
{
    protected $table = 'ongkirs';
    protected $fillable = ['transaksi_id','tgl_pengiriman','alamat', 'kode_pos', 'kabupaten', 'detail_alamat','status'];
    use HasFactory;

    public function payment(){
        return $this->hasOne(Payment::class, 'transaksi_id','transaksi_id');
    }
    public function user()
    {
        return $this->hasOne(User::class , 'id', 'user_id');
    }
    public function statusOngkir(){
        return $this->hasMany(StatusOngkir::class, 'ongkir_id', 'id');
    }
}
