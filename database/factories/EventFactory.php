<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\adEvent;
use Faker\Generator as Faker;

$factory->define(adEvent::class, function (Faker $faker) {
    return [
        'dateHeureEvent' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now'),
        'du' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'au' => $faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});
