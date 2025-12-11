<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('t_user', function (Blueprint $table) {
            $table->unsignedBigInteger('id_penyewa')->nullable()->change();
            $table->unsignedBigInteger('id_pengelola')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('t_user', function (Blueprint $table) {
            $table->unsignedBigInteger('id_penyewa')->nullable(false)->change();
            $table->unsignedBigInteger('id_pengelola')->nullable(false)->change();
        });
    }
};
