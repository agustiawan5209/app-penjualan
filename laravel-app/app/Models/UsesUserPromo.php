<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsesUserPromo extends Model
{
    use HasFactory;
    protected $table= 'uses_user_promos';
    protected $fillable= ['user_id', 'promo_id','status'];
    protected $hidden = ['status'];
}
