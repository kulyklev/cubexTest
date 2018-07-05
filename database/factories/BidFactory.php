<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Bid::class, function (Faker $faker) {
    return [
        'theme' => $faker->title,
        'message' => $faker->sentences,
        //'file' => $faker->
    ];
});
