<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TableDiskon extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'diskons';
    protected $fillable = ['barang_id', 'jumlah_diskon','tgl_mulai', 'tgl_kadaluarsa'];

    public function barang(){
        return $this->hasOne(Barang::class, 'id', 'barang_id');
    }
}
