<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Rune;
use Faker\Generator as Faker;

$factory->define(Rune::class, function (Faker $faker) {
    return [
        'name'=>$faker->word,
        'image'=>$faker->imageUrl(),
        'bonus'=>$faker->paragraph
    ];
});
