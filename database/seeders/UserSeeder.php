<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => 17, //Segera hadir untuk admin
                'name' => 'Tes 123',
                'email' => 'tes@mail.com',
                'password' => Hash::make('123'),
                'pengajuan' => '0',
                'role' => 1,
                'created_at' => '2022-04-17 16:42:51',
                'updated_at' => '2022-04-17 16:42:51',
            ],
            [
                'id' => 19,
                'name' => 'www',
                'email' => 'w@mail.com',
                'password' => Hash::make('123'),
                'pengajuan' => '-',
                'role' => 2,
                'created_at' => '2022-04-17 17:19:30',
                'updated_at' => '2022-06-23 09:19:46',
            ],
            [
                'id' => 20,
                'name' => 'Hanafi Muamar',
                'email' => 'hanafi@gmail.com',
                'password' => Hash::make('123'),
                'pengajuan' => '0',
                'role' => 2,
                'created_at' => '2022-04-18 00:26:03',
                'updated_at' => '2022-06-23 09:15:11',
            ],
            [
                'id' => 24,
                'name' => 'Satrio',
                'email' => 'tio@mail.com',
                'password' => Hash::make('123'),
                'pengajuan' => null,
                'role' => 2,
                'created_at' => '2022-06-23 23:23:54',
                'updated_at' => '2022-06-23 23:23:54',
            ],
            [
                'id' => 27,
                'name' => 'bro',
                'email' => 'bro@mail.com',
                'password' => Hash::make('123'),
                'pengajuan' => null,
                'role' => 2,
                'created_at' => '2022-06-26 07:45:02',
                'updated_at' => '2022-06-26 07:45:02',
            ],
        ]);
    }
}
