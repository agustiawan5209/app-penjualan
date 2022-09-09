<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DIskon extends Model
{
    use HasFactory;
    protected $table = 'diskons';
    protected $fillable = ['barang_id', 'jumlah_diskon','tgl_mulai', 'tgl_kadaluarsa'];
    public function barang(){
        return $this->hasOne(Barang::class, 'id', 'barang_id');
    }
}
