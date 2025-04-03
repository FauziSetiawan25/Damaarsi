<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GambarLayanan extends Model
{
    use HasFactory;

    protected $fillable = ['id_layanan', 'gambar'];

    protected $table = 'gambar_layanan';

    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'id_layanan');
    }
}
