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
        $this->call(ChestsTableSeeder::class);
        $this->call(PrizesTableSeeder::class);
        $this->call(RunesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
