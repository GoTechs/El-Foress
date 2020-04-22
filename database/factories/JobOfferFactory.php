<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\adJoboffer;
use Faker\Generator as Faker;

$factory->define(adJoboffer::class, function (Faker $faker) {
    return [
        'domaine' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'entreprise' => $faker->company,
        'adresse' => $faker->address,
        'poste' => $faker->jobTitle,
        'salaire' => $faker->numberBetween(25000, 65000),        
        'diplomeRequis' => $faker->sentence($nbWords = 6, $variableNbWords = true),
    ];
});
