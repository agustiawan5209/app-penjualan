<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;
    protected $table = 'barang_masuks';
    protected $fillable = ['barang_id', 'jumlah', 'pemasok','tgl_masuk', 'status'];

    public function barang(){
        return $this->hasOne(Barang::class, 'id', 'barang_id');
    }
}
