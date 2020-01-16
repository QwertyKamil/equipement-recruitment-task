<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\Prize;
use Faker\Generator as Faker;

$factory->define(Prize::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'image'=>$faker->imageUrl(),
        'code'=>base64_encode($faker->word)
    ];
});
