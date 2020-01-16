<?php

use App\Models\Chest;
use Illuminate\Database\Seeder;

class ChestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Chest::class,10)->create();
    }
}
