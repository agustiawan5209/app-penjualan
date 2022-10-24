<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Katalog extends Model
{
    use HasFactory;
    public $table='katalogs';
    public $fillable = [
        'jenis_id','nama_katalog'
    ];
    public function jenis(){
        return $this->hasOne(Jenis::class, 'id', 'jenis_id');
    }
}
