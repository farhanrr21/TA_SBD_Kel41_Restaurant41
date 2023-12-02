<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $elemen = [
            ['username' => 'farhanrafli', 'password' => 'ryan21', 'kelompok' => '41'],
            ['username' => 'aditya', 'password' => '12345', 'kelompok' => '41'],
            ['username' => 'adi_chan', 'password' => '12345', 'kelompok' => '41'],
            ['username' => 'awangsyah', 'password' => '12345', 'kelompok' => '41'],
        ];

        foreach ($elemen as $data){
            DB::insert('INSERT INTO users(username, password, kelompok) VALUES (:username, :password, :kelompok)',
                [
                    'username' => $data['username'],
                    'password' => $data['password'],
                    'kelompok' => $data['kelompok'],
                ]
            );
        }
    }
}
