<?php

use App\Models\Prize;
use Illuminate\Database\Seeder;

class PrizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Prize::class,10)
            ->create();
    }
}
