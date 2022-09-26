<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Katalog extends Model
{
    use HasFactory;
    public $table='katalogs';
    public $fillable = [
        'barang_id','nama_katalog'
    ];
    public function barang(){
        return $this->hasOne(Barang::class, 'id', 'barang_id');
    }
}
