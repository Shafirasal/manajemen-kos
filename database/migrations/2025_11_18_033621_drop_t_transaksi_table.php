
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Drop tabel t_transaksi
        Schema::dropIfExists('t_transaksi');
    }

    public function down()
    {
        // Kalau mau restore, bisa bikin ulang minimal struktur dasar
        Schema::create('t_transaksi', function ($table) {
            $table->id('id_transaksi');
            $table->unsignedBigInteger('id_penyewa');
            $table->unsignedBigInteger('id_kamar');
            $table->date('tanggal_bayar')->nullable();
            $table->date('tanggal_masuk');
            $table->date('tanggal_keluar');
            $table->enum('status', ['lunas', 'belum_lunas']);
            $table->timestamps();
        });
    }
};
