<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\adimmobilier;
use Faker\Generator as Faker;

$factory->define(adimmobilier::class, function (Faker $faker) {
    return [
        'typeBien' => 'Local',
        'superficie' => $faker->numberBetween(42, 450),
        'nbrePiece' => $faker->numberBetween(1, 6),
        'etage' => $faker->numberBetween(1, 18),
    ];
});
