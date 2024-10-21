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
            $table->enum('role',['admin','superadmin', 'nonaktif']);
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('produk',function(Blueprint $table){
            $table->id();
            $table->date('terahir_diubah');
            $table->string('nama_produk');
            $table->text('deskripsi');
            $table->integer('harga');
            $table->string('gambar1');
            $table->string('gambar2')->nullable();;
            $table->string('gambar3')->nullable();;
            $table->timestamps();
        });
        Schema::create('testimoni',function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('id_produk');
            $table->date('tgl_ditambahkan');
            $table->string('nama');
            $table->text('testimoni');
            $table->string('foto');
            $table->enum('status', ['aktif', 'nonaktif'])->default('nonaktif');
            $table->timestamps();

            $table->foreign('id_produk')->references('id')->on('produk')->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::create('portofolio',function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('id_produk');
            $table->unsignedBigInteger('id_admin');
            $table->string('nama');
            $table->date('tgl_selesai');
            $table->integer('luas');
            $table->string('gambar1');
            $table->string('gambar2')->nullable();;
            $table->string('gambar3')->nullable();;
            $table->timestamps();

            $table->foreign('id_produk')->references('id')->on('produk')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_admin')->references('id')->on('admin')->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::create('pengaturan_web',function(Blueprint $table){
            $table->id();
            $table->text('value');
            $table->string('keterangan');
            $table->timestamps();
        });
        // Schema::create('pengaturan_banner',function(Blueprint $table){
            
        // });
        Schema::create('customer',function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('id_produk');
            $table->date('tgl_mengisi');
            $table->string('nama');
            $table->integer('no_telp');
            $table->string('email');
            $table->timestamps();

            $table->foreign('id_produk')->references('id')->on('produk')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin');
        Schema::dropIfExists('produk');
        Schema::dropIfExists('testimoni');
        Schema::dropIfExists('portofolio');
        Schema::dropIfExists('pengaturan_web');
        Schema::dropIfExists('pengaturan_banner');
        Schema::dropIfExists('customer');
    }
};
