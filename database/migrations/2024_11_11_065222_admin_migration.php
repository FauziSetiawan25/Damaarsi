<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admin',function(Blueprint $table){
            $table->id();
            $table->string('nama_admin');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('no_telp', 15);
            $table->string('email');
            $table->enum('role',['admin','superadmin', 'nonaktif'])->default('admin');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin');
    }
};
