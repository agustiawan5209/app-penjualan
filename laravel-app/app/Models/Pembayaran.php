<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Pembayaran extends Model
{
    use HasFactory;
    use Notifiable;
    protected $table = 'pembayarans';
    protected $fillable = ['user_id','no_telpon', 'total_price', 'metode_pengiriman','payment_status', 'payment_type', 'payment_code', 'pdf_url', 'transaksi_id', 'nama', 'item_details', 'tgl_transaksi'];
    protected $hidden = ['payment_status', 'payment_type', 'payment_code', 'pdf_url', 'transaksi_id', 'snap_token'];


    public function ongkir(){
        return $this->hasOne(Ongkir::class, 'transaksi_id','transaksi_id');
    }
    public function user()
    {
        return $this->hasOne(User::class , 'id', 'user_id');
    }
    public function transaksi(){
        return $this->hasMany(Transaksi::class, 'ID_transaksi', 'transaksi_id');
    }
}
