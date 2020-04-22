<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\adJobapplication;
use Faker\Generator as Faker;

$factory->define(adJobapplication::class, function (Faker $faker) {
    return [
        'sexe' => 'Homme',
        'domaine' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'age' => $faker->numberBetween(18, 50),
        'poste' => $faker->jobTitle,
        'niveau' => $faker->sentence($nbWords = 6, $variableNbWords = true),        
        'diplome' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'anneExp' => $faker->numberBetween(1, 12), 
    ];
});
