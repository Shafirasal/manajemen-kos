<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('t_penyewa', function (Blueprint $table) {
            $table->id('id_penyewa');
            $table->string('nama', 50);
            $table->string('alamat', 225);
            $table->string('no_hp', 15);
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('t_penyewa');
    }
};
