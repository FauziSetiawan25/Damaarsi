<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produk',function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('id_admin');
            $table->string('nama_produk');
            $table->enum('tipe',['Desain','Paket']);
            $table->text('deskripsi');
            $table->integer('harga');
            $table->timestamps();
            
            $table->foreign('id_admin')->references('id')->on('admin')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
