<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alasan extends Model
{
    use HasFactory;

    protected $table = 'beranda_alasan';

    public function gambarAlasan()
    {
        return $this->hasMany(GambarAlasan::class, 'id_alasan');
    }
}
