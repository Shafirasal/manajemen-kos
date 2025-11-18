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
        Schema::create('t_transaksi_pembayaran', function (Blueprint $table) {

            $table->id('id_transaksi_pembayaran');

            $table->unsignedBigInteger('id_transaksi_sewa');

            $table->date('tanggal_bayar');
            $table->text('uraian')->nullable();
            $table->integer('nominal');
            $table->string('bukti_bayar', 255)->nullable();

            $table->enum('status', ['bayar', 'tidak_bayar'])->default('tidak_bayar');

            // Foreign key ke transaksi sewa
            $table->foreign('id_transaksi_sewa')
                ->references('id_transaksi_sewa')
                ->on('t_transaksi_sewa')
                ->onDelete('cascade'); 
                // cascade = jika transaksi sewa dihapus, semua pembayaran ikut terhapus

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_transaksi_pembayaran');
    }
};
