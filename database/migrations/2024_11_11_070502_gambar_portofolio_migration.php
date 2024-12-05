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
        Schema::create('gambar_portofolio',function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('id_portofolio');  
            $table->text('gambar');
            $table->timestamps();

            $table->foreign('id_portofolio')->references('id')->on('portofolio')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gambar_portofolio');
    }
};
