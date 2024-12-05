<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GambarProduk extends Model
{
    use HasFactory;

    protected $fillable = ['id_produk', 'gambar'];

    protected $table = 'gambar_produk';

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}
