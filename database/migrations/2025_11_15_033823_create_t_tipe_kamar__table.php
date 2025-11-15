<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('t_tipe_kamar', function (Blueprint $table) {
            $table->id('id_tipe_kamar'); // primary key BIGINT auto increment
            $table->string('jenis_tipe_kamar', 100);
            $table->integer('harga_perbulan');
            $table->text('fasilitas');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('t_tipe_kamar');
    }
};
