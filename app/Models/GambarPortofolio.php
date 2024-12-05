<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GambarPortofolio extends Model
{
    use HasFactory;
    
    protected $fillable = ['id_portofolio', 'gambar'];

    protected $table = 'gambar_portofolio';

    public function portofolio()
    {
        return $this->belongsTo(Portofolio::class);
    }
}
