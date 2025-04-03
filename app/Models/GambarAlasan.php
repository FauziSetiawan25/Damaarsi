<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GambarAlasan extends Model
{
    use HasFactory;

    protected $fillable = ['id_alasan', 'gambar'];

    protected $table = 'gambar_alasan';

    public function alasan()
    {
        return $this->belongsTo(Alasan::class, 'id_alasan');
    }
}
