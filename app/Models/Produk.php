<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'id_admin',
        'nama_produk',
        'tipe',
        'harga',
        'deskripsi',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin');
    }

    public function customers()
    {
        return $this->hasMany(Customer::class, 'id_produk');
    }

    public function gambarProduk()
    {
        return $this->hasMany(GambarProduk::class, 'id_produk', 'id');
    }

    public function testimoni()
    {
        return $this->hasMany(Testimoni::class);
    }

}
