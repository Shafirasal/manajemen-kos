<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('t_user')->insert([
            'username'     => '12345678910',
            'password'     => Hash::make('12345'), // ganti kalau perlu
            'role'         => 'pemilik',
            'id_penyewa'   => null,
            'id_pengelola' => null,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);
    }
}
