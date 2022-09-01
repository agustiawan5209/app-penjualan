<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'keranjangs';
    protected $fillable = [
        'quantity','sub_total','user_id','barang_id','potongan_nominal','potongan_persen',
    ];
    protected $hidden = [

    ];

    public function barang()
    {
        return $this->hasOne(Barang::class, 'id', 'barang_id');
    }
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
