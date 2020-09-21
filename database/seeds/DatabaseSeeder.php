<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SingerSeeder::class);
        $this->call(GenreSeeder::class);
        $this->call(MusicSeeder::class);
    }
}
