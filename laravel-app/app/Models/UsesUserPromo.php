<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsesUserPromo extends Model
{
    use HasFactory;
    protected $table= 'uses_user_promos';
    protected $fillable= ['user_id', 'promo_id','status'];

    public function promo(){
        return $this->hasOne(Promo::class, 'id', 'promo_id');
    }
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
