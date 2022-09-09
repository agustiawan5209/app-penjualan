<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsesUserVoucher extends Model
{
    use HasFactory;
    protected $table= 'uses_user_vocuhers';
    protected $fillable= ['user_id', 'vocuher_id','status'];
    protected $hidden = ['status'];
}
