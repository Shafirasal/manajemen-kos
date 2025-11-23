<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('t_transaksi_pembayaran', function (Blueprint $table) {
            $table->date('tanggal_bayar')->nullable()->change();
            $table->string('bukti_bayar')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('t_transaksi_pembayaran', function (Blueprint $table) {
            $table->date('tanggal_bayar')->nullable(false)->change();
            $table->string('bukti_bayar')->nullable(false)->change();
        });
    }
};
