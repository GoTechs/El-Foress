<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\adCar;
use Faker\Generator as Faker;

$factory->define(adCar::class, function (Faker $faker) {
    return [
        'vente' => 'selling',
        'marque' => $faker->sentence($nbWords = 2, $variableNbWords = true),
        'annee' => $faker->year($max = 'now')  ,
        'kilometrage' => $faker->numberBetween(1000, 100000),        
        'typeCarb' => 'Essence',
    ];
});
