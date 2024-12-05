<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',           
        'id_produk',      
        'id_admin',      
        'tgl_selesai',    
        'luas',             
    ];

    protected $table = 'portofolio';

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin');
    }
    public function gambarPortofolio()
    {
        return $this->hasMany(GambarPortofolio::class, 'id_portofolio', 'id');
    }
}
