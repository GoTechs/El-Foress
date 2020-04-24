<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\annonce;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

$factory->define(annonce::class, function (Faker $faker) {

    $idCat = App\categories::all()->random()->idCat;           

    $idSubCat = App\souscategories::where('id_Cat', $idCat)->first()->idSousCat;   

    if ($idSubCat == '2'){
        $nameTable = 'ad_events';
    }

    elseif ($idSubCat == '53') {
        $nameTable = 'ad_joboffers';
    }

    elseif ($idSubCat == '54') {
        $nameTable = 'ad_jobapplications';
    }

    elseif ($idCat == '3') {
        $nameTable = 'adimmobiliers';
    }

    elseif ($idSubCat <> '14' and $idCat == '4') {
        $nameTable = 'ad_cars';
    }

    elseif ($idSubCat == '16') {
        $nameTable = 'ad_phones';
    }

    elseif ($idSubCat == '36') {
        $nameTable = 'ad_storages';
    }

    elseif ($idSubCat == '37') {
        $nameTable = 'ad_computers';
    } else {
        $nameTable = '';
    }

    return [
        'titre' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'description' => $faker->text($maxNbChars = 500),
        'prix' => $faker->numberBetween(10, 10000),
        'email' => $faker->unique()->freeEmail,
        'phoneNumber' => $faker->tollFreePhoneNumber,        
        'phoneHide' => 0,
        'id_Cat' => $idCat, 
        'id_sous_Cat' => $idSubCat,
        'id_user' => factory(\App\Users::class)->create(),
        'wilaya' => "Oran",
        'stateAd' => 1,
        'nameTable' => $nameTable,
        'numberViews' => 0,
        'hasPicture' => 1,
    ];
});

$factory->afterCreating(\App\annonce::class, function ($post, $faker) {

    $idCat = $post->id_Cat;           

    $idSubCat = $post->id_sous_Cat;   

    if ($idSubCat == '2'){
        factory(\App\adEvent::class)->create([
            'id_annonce' => $post->id
        ]);
    }

    elseif ($idSubCat == '53') {
        factory(\App\adJoboffer::class)->create([
            'id_annonce' => $post->id
        ]);
    }

    elseif ($idSubCat == '54') {
        factory(\App\adJobapplication::class)->create([
            'id_annonce' => $post->id
        ]);
    }

    elseif ($idCat == '3') {
        factory(\App\adimmobilier::class)->create([
            'id_annonce' => $post->id
        ]);
    }

    elseif ($idSubCat <> '14' and $idCat == '4') {
        factory(\App\adCar::class)->create([
            'id_annonce' => $post->id
        ]);
    }

    elseif ($idSubCat == '16') {
        factory(\App\adPhone::class)->create([
            'id_annonce' => $post->id
        ]);
    }

    elseif ($idSubCat == '36') {
        factory(\App\adStorage::class)->create([
            'id_annonce' => $post->id
        ]);
    }

    elseif ($idSubCat == '37') {
        factory(\App\adComputer::class)->create([
            'id_annonce' => $post->id
        ]);
    }
});
