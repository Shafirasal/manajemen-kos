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
        Schema::table('t_transaksi_pembayaran', function (Blueprint $table) {
            // Mengubah kolom status dengan menghapus default-nya
            $table->enum('status', ['bayar', 'tidak_bayar'])
                  ->nullable()
                  ->default(null)
                  ->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('t_transaksi_pembayaran', function (Blueprint $table) {
            // Mengembalikan default seperti semula
            $table->enum('status', ['bayar', 'tidak_bayar'])
                  ->default('tidak_bayar')
                  ->change();
        });
    }
};
