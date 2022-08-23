<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barangs';
    protected $fillable = [
        'gambar','kode_barang', 'jenis_id','harga','deskripsi','satuan_id','tgl_perolehan',
    ];

    public function satuan(){
        return $this->hasOne(Satuan::class, 'id','satuan_id');
    }
    public function jenis(){
        return $this->hasOne(Jenis::class, 'id','jenis_id');
    }
}
