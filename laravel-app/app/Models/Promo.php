<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;
    protected $table = 'promos';
    protected $fillable = ['thumbnail','kode_promo', 'category_id', 'max_user', 'use_user',  'promo_persen','deskripsi', 'promo_nominal', 'tgl_mulai', 'tgl_kadaluarsa','status'];
    // protected $dates = ['deleted_at'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
