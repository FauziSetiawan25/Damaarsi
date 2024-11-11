<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'nama_admin' => 'Udin',
            'username' => 'admin01',
            'password' => Hash::make('qwerty'),  // Pastikan password di-hash
            'role' => 'admin',
        ]);
    }
}