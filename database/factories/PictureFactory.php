<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\imagead;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Faker\Generator as Faker;

$factory->define(imagead::class, function (Faker $faker) {

    $image = $faker->image();
    $imageFile = new File($image);

    return [
        'imagename' => Storage::disk('s3')->putFile('images', $imageFile, 'public'),
        'id_annonce' => factory(\App\annonce::class)->create(),
    ];
});
