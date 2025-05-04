<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $table = 'admin';  

    protected $username = 'username';

    protected $fillable = [
        'nama_admin',
        'username',
        'no_telp',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}


