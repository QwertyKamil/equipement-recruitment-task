<?php

use App\Models\Rune;
use Illuminate\Database\Seeder;

class RunesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Rune::class,10)->create();
    }
}
