<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'superadmin@mail.test',
            'password' => Hash::make('superadmin'), // Menggunakan Hash untuk enkripsi password
            'nama' => 'superadmin',
            'alamat' => 'Bandung',
            'role' => 'superadmin', // Role ditetapkan sebagai admin
        ]);

        DB::table('users')->insert([
            'email' => 'admin@mail.test',
            'nama' => 'admin',
            'alamat' => 'Bandung',
            'password' => Hash::make('admin'), // Menggunakan Hash untuk enkripsi password
            'role' => 'admin', // Role ditetapkan sebagai admin
        ]);

        DB::table('users')->insert([
            'email' => 'member@mail.test',
            'nama' => 'member',
            'alamat' => 'Bandung',
            'password' => Hash::make('member'), // Menggunakan Hash untuk enkripsi password
            'role' => 'member', // Role ditetapkan sebagai admin
        ]);
    }
}
