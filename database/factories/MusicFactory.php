<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Music;
use Faker\Generator as Faker;

$factory->define(Music::class, function (Faker $faker) {

    return [
        'name' => $faker->unique()->word(),
        'singer_id' =>$faker->numberBetween(1, App\Singer::count()),
        'genre_id' =>$faker->numberBetween(1, App\Genre::count()),
        'year' =>$faker->numberBetween(1990,2020),
    ];
});
