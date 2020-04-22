<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\adStorage;
use Faker\Generator as Faker;

$factory->define(adStorage::class, function (Faker $faker) {
    return [
        'type' => 'Disque dur externe',
        'marque' => 'Adata',
        'capacite' => $faker->numberBetween(6, 36),
    ];
});
