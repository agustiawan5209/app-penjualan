<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $table = 'banks';
    protected $fillable = ['nama_pemilik', 'nama_bank', 'no_rek'];
    protected $hidden = ['nama_pemilik', 'nama_bank', 'no_rek'];

}
