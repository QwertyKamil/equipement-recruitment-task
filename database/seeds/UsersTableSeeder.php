<?php

use App\Models\Chest;
use App\Models\Prize;
use App\Models\Rune;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)->create()
            ->each(function (User $user) {
                foreach (Prize::inRandomOrder()->limit(3)->get() as $item) {
                    $user->prizes()->attach($item, [
                        'status' => rand(0, 3)
                    ]);
                }
                foreach (Chest::inRandomOrder()->limit(3)->get() as $item) {
                    $user->chests()->attach($item);
                }
                foreach (Rune::inRandomOrder()->limit(3)->get() as $item) {
                    $user->runes()->attach($item);
                }
            });
    }
}
