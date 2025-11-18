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
        Schema::create('t_transaksi_sewa', function (Blueprint $table) {
            $table->id('id_transaksi_sewa');

            $table->unsignedBigInteger('id_penyewa');
            $table->unsignedBigInteger('id_kamar');

            $table->integer('lama_sewa');
            $table->date('tanggal_sewa');
            $table->date('tanggal_batas_sewa');

            $table->enum('status', ['aktif', 'tidak_aktif'])->default('tidak_aktif');

            $table->foreign('id_penyewa')
                ->references('id_penyewa')
                ->on('t_penyewa')
                  ->onDelete('cascade');

            $table->foreign('id_kamar')
                ->references('id_kamar')
                ->on('t_kamar')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_transaksi_sewa');
    }
};
