<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobils', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_mobil');
            $table->text('deskripsi');
            $table->integer('harga');
            $table->integer('stok');
            $table->string('foto');
            $table->unsignedBigInteger('id_jenis');
            $table->unsignedBigInteger('id_merk');
            // relasi
            $table->foreign('id_jenis')->references('id')->on('jenis')->onDelete('cascade');
            $table->foreign('id_merk')->references('id')->on('merks')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mobils');
    }
};
