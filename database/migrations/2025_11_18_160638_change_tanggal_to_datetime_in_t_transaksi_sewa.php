<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('t_transaksi_sewa', function (Blueprint $table) {
            $table->dateTime('tanggal_sewa')->change();
            $table->dateTime('tanggal_batas_sewa')->change();
        });
    }

    public function down(): void
    {
        Schema::table('t_transaksi_sewa', function (Blueprint $table) {
            $table->date('tanggal_sewa')->change();
            $table->date('tanggal_batas_sewa')->change();
        });
    }
};
