<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\adComputer;
use Faker\Generator as Faker;

$factory->define(adComputer::class, function (Faker $faker) {
    return [
        'marque' => $faker->sentence($nbWords = 2, $variableNbWords = true),
        'tailleEcran' => '15 po',
        'processeur' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'ram' => $faker->numberBetween(2, 16),
        'tailleDisque' => $faker->numberBetween(128, 1024),
    ];
});
