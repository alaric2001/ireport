<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id'         => 17,
                'name'       => 'Tes 123',
                'email'      => 'tes@mail.com',
                'password'   => '$2y$10$yIVbdXMH5/BzAQj9vmNLVe09c6csIaId6oWBKLUlva0OUBN43m5Ki',
                'pengajuan'  => '0',
                'role'       => 1,
                'created_at' => '2022-04-17 16:42:51',
                'updated_at' => '2022-04-17 16:42:51',
            ],
            [
                'id'         => 19,
                'name'       => 'www',
                'email'      => 'w@mail.com',
                'password'   => '$2y$10$8JmrTmveGuizgDf2LB9SZ.XnajZMKtLC0RymtVlzq42.J80EjNT1u',
                'pengajuan'  => '-',
                'role'       => 2,
                'created_at' => '2022-04-17 17:19:30',
                'updated_at' => '2022-06-23 09:19:46',
            ],
            [
                'id'         => 20,
                'name'       => 'Hanafi Muamar',
                'email'      => 'hanafi@gmail.com',
                'password'   => '$2y$10$RXK493z646T/rte.m.Jn0esgN3.JzsiEdvYaSs.J2TsPKTaPFwEM2',
                'pengajuan'  => '0',
                'role'       => 2,
                'created_at' => '2022-04-18 00:26:03',
                'updated_at' => '2022-06-23 09:15:11',
            ],
            [
                'id'         => 24,
                'name'       => 'Satrio',
                'email'      => 'tio@mail.com',
                'password'   => '$2y$10$JwNU354G6UYlBZX204Hjiuc3MeoWyIi8tevRy5FATVmp/P98QmWYi',
                'pengajuan'  => null,
                'role'       => 2,
                'created_at' => '2022-06-23 23:23:54',
                'updated_at' => '2022-06-23 23:23:54',
            ],
            [
                'id'         => 27,
                'name'       => 'bro',
                'email'      => 'bro@mail.com',
                'password'   => '$2y$10$9HmlGfro0wgIWXt2MJD./eXL4Sgla6oV95U2z0lv/vDTUJ53g2Xta',
                'pengajuan'  => null,
                'role'       => 2,
                'created_at' => '2022-06-26 07:45:02',
                'updated_at' => '2022-06-26 07:45:02',
            ],
        ]);
    }
}
