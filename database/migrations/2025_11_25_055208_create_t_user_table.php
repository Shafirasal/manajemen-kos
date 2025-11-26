<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('t_user', function (Blueprint $table) {
            $table->id('id_user');

            // FK ke penyewa (opsional, nullable)
            $table->unsignedBigInteger('id_penyewa');
            $table->unsignedBigInteger('id_pengelola');

            $table->string('username', 100)->unique();
            $table->string('password', 255);

            $table->enum('role', ['pemilik', 'operator', 'penyewa']);

            $table->timestamps();

            // Foreign Keys
            $table->foreign('id_penyewa')
                  ->references('id_penyewa')
                  ->on('t_penyewa')
                  ->onDelete('cascade');

            $table->foreign('id_pengelola')
                  ->references('id_pemilik')
                  ->on('t_pengelola')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('t_user');
    }
};
