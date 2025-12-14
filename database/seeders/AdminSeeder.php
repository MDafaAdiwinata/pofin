<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'nama_lengkap'  => 'admin',
            'username'      => 'admin',
            'email'         => 'admin@gmail.com',
            'password'      => Hash::make('admin123'), // hashing otomatis
            'role'          => 'admin',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);
    }
}
