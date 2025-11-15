<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('t_transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');

            $table->unsignedBigInteger('id_penyewa');
            $table->unsignedBigInteger('id_kamar');

            $table->date('tanggal_bayar')->nullable();
            $table->date('tanggal_masuk');
            $table->date('tanggal_keluar');
            $table->enum('status', ['lunas', 'belum_lunas']);

            $table->timestamps();

            // Foreign key ke t_penyewa
            $table->foreign('id_penyewa')
                  ->references('id_penyewa')
                  ->on('t_penyewa')
                  ->onDelete('cascade');

            // Foreign key ke t_kamar
            $table->foreign('id_kamar')
                  ->references('id_kamar')
                  ->on('t_kamar')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('t_transaksi');
    }
};
