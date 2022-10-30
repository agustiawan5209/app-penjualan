<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;
    protected $table = 'barang_keluars';
    protected $fillable = ['barang_id', 'jumlah', 'pemasok','tgl_masuk', 'status'];

    public function barang(){
        return $this->hasOne(Barang::class, 'id', 'barang_id');
    }
    public function status($value){
        switch ($$value) {
            case '0':
                $msg = "Bagus";
                break;
            case '1':
                $msg = "Buruk";
                break;
            case '2':
                $msg = "Rusak";
                break;

            default:
                $msg = "Keluar";
                break;
        }
    }
}
