<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayarans';
    protected $fillable = ['user_id','number', 'total_price', 'payment_status', 'payment_type', 'payment_code', 'pdf_url', 'transaksi_id', 'snap_token', 'item_details', 'tgl_transaksi'];
    protected $hidden = ['payment_status', 'payment_type', 'payment_code', 'pdf_url', 'transaksi_id', 'snap_token'];


    public function ongkir(){
        return $this->belongsTo(ongkir::class, 'transaksi_id','transaksi_id');
    }
    public function user()
    {
        return $this->hasOne(User::class , 'id', 'user_id');
    }
    public function transaksi(){
        return $this->hasMany(Transaksi::class, 'ID_transaksi', 'transaksi_id');
    }
}
