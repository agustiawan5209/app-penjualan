<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    use HasFactory;
    protected $table = 'satuans';
    protected $fillable = [
        'nama_satuan',
    ];
    public function barang(){
        return $this->hasOne(Barang::class, 'satuan_id','id');
    }
}
