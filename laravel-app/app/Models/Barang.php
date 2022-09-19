<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barangs';
    protected $fillable = ['gambar', 'kode_barang', 'jenis_id', 'harga', 'deskripsi', 'satuan_id', 'tgl_perolehan'];
    public $timestamps = true;

    public function satuan()
    {
        return $this->hasOne(Satuan::class, 'id', 'satuan_id');
    }
    public function jenis()
    {
        return $this->hasOne(Jenis::class, 'id', 'jenis_id');
    }
    public function diskon()
    {
        return $this->hasMany(Diskon::class, 'barang_id', 'id');
    }
    public function katalog(){
        return $this->belongsTo(Katalog::class, 'barang_id', 'id');
    }
}
