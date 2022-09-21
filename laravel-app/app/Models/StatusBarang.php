<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusBarang extends Model
{
    use HasFactory;
    protected $table = 'status_barangs';
    protected $fillable = ['ongkir_id','pembayaran_id', 'ket'];

    public function ongkir(){
        return $this->hasOne(ongkir::class ,'id', 'ongkir_id');
    }
}
