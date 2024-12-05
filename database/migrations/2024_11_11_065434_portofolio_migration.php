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
        Schema::create('portofolio',function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('id_produk');
            $table->unsignedBigInteger('id_admin');
            $table->date('tgl_selesai');
            $table->string('nama');
            $table->integer('luas');
            $table->string('lokasi')->nullable();
            $table->timestamps();

            $table->foreign('id_produk')->references('id')->on('produk')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_admin')->references('id')->on('admin')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portofolio');
    }
};
