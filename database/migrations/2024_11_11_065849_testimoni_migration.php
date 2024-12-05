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
        Schema::create('testimoni',function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('id_produk');
            $table->string('nama');
            $table->text('testimoni');
            $table->string('gambar');
            $table->enum('status', ['aktif', 'nonaktif'])->default('nonaktif');
            $table->timestamps();

            $table->foreign('id_produk')->references('id')->on('produk')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimoni');
    }
};
