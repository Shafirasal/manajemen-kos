<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('t_transaksi_pembayaran', function (Blueprint $table) {
            $table->date('tanggal_jatuh_tempo')->nullable()->after('tanggal_bayar');
            // Ubah "nama_kolom_sebelumnya" sesuai kebutuhan penempatan kolom
        });
    }

    public function down(): void
    {
        Schema::table('t_transaksi_pembayaran', function (Blueprint $table) {
            $table->dropColumn('tanggal_jatuh_tempo');
        });
    }
};
