<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\adPhone;
use Faker\Generator as Faker;

$factory->define(adPhone::class, function (Faker $faker) {
    return [
        'marque' => $faker->sentence($nbWords = 2, $variableNbWords = true),
        'modele' => $faker->sentence($nbWords = 3, $variableNbWords = true),
    ];
});
