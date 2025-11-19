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
        Schema::table('t_transaksi_sewa', function (Blueprint $table) {
            // Hapus default dari kolom status
            $table->enum('status', ['aktif', 'tidak_aktif'])
                  ->default(null)
                  ->nullable()
                  ->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('t_transaksi_sewa', function (Blueprint $table) {
            // Kembalikan default seperti awal
            $table->enum('status', ['aktif', 'tidak_aktif'])
                  ->default('tidak_aktif')
                  ->change();
        });
    }
};
