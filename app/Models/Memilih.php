<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memilih extends Model
{
    use HasFactory;

    protected $table = 'memilih';

    // public function gambarAlasan()
    // {
    //     return $this->hasMany(GambarAlasan::class, 'id_alasan');
    // }
}
