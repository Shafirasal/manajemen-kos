<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('t_penyewa', function (Blueprint $table) {
            $table->string('foto_ktp', 255)->nullable()->after('jenis_kelamin');
            $table->string('pekerjaan', 100)->nullable()->after('foto_ktp');
        });
    }

    public function down()
    {
        Schema::table('t_penyewa', function (Blueprint $table) {
            $table->dropColumn(['foto_ktp', 'pekerjaan']);
        });
    }
};
