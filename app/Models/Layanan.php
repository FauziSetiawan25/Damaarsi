<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;
    protected $table = 'beranda_layanan';

    public function gambarLayanan()
    {
        return $this->hasMany(GambarLayanan::class, 'id_layanan');
    }
}
