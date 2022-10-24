<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barangs';
    protected $fillable = ['gambar', 'nama_barang','kode_barang', 'katalog_id', 'harga', 'stock','deskripsi', 'satuan_id', 'tgl_perolehan'];
    public $timestamps = true;

    public function satuan()
    {
        return $this->hasOne(Satuan::class, 'id', 'satuan_id');
    }
    public function katalog()
    {
        return $this->hasOne(Katalog::class, 'id', 'katalog_id');
    }
    public function diskon()
    {
        return $this->hasMany(TableDiskon::class, 'barang_id', 'id');
    }
    public function ulasan(){
        return $this->hasMany(ulasan::class, 'barang_id', 'id');
    }

    public function hargaBarang($value){
        return "Rp.". number_format($value,0,2);
    }
}
