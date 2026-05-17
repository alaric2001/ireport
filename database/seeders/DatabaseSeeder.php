<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ProfileSeeder::class,
            BeritaSeeder::class,
            LaporanSeeder::class,
            KomentarSeeder::class,
            OurteamSeeder::class,
        ]);
    }
}
