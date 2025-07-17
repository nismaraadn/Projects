<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Fradinka Amelia Edyputri',
                'email' => 'fradinka@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'petugas gudang'
            ],
            [
                'name' => 'Manda Diana Putri',
                'email' => 'manda@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'produksi'
            ],
            [
                'name' => 'Nismara Andini',
                'email' => 'nismara@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'qc'
            ],
            [
                'name' => 'Ananda Alvin Bernerdian',
                'email' => 'Ananda@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'produksi'
            ],
        ];

        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }
    }
}