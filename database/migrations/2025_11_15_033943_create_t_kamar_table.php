<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('t_kamar', function (Blueprint $table) {
            $table->id('id_kamar');

            $table->unsignedBigInteger('id_tipe_kamar');
            $table->string('no_kamar', 3);
            $table->enum('status', ['tersedia', 'disewa']);

            $table->timestamps();

            // Foreign key ke t_tipe_kamar
            $table->foreign('id_tipe_kamar')
                  ->references('id_tipe_kamar')
                  ->on('t_tipe_kamar')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('t_kamar');
    }
};
