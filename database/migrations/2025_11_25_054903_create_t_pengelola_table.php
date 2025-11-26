<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('t_pengelola', function (Blueprint $table) {
            $table->id('id_pemilik'); // primary key
            $table->string('nama', 50);
            $table->string('alamat', 225);
            $table->string('no_hp', 15);
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('t_pengelola');
    }
};
