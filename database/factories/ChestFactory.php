<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Chest;
use Faker\Generator as Faker;

$factory->define(Chest::class, function (Faker $faker) {
    return [
        'name'=>$faker->word,
        'image'=>$faker->imageUrl(),
        'price'=>$faker->randomFloat(2,0.5,100)
    ];
});
