<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/Apropos', function () {
    return view('Apropos');
});

Route::get('/categorie', function () {
    return view('categorie');
});

Route::get('/forgetPassword', function () {
    return view('mdp-oublier');
});

Route::get('/home', function () {
    return view('profil.home');
});

// Route for Authentication

Route::get('/inscription','AuthController@create');
Route::post('/inscription','AuthController@store');

Route::get('/connexion','AuthController@connexion');
Route::post('/connexion','AuthController@checklogin');

Route::get('/logout','AuthController@logout');


// Route to Profil

Route::get('/home','ProfilController@home');
Route::get('/myads','ProfilController@myads');
Route::get('/favorites','ProfilController@favorits');
Route::get('/archives','ProfilController@archives');
//Route::get('/addAd','ProfilController@create');
Route::post('/addAd','ProfilController@store');

// Dynamic dropDown Categorie And Sous categorie

Route::get('/addAd','categorieController@categories');

Route::get('/json-sousCategorie','categorieController@sousCat');

// Insert Ad

Route::post('/insertAd','insertAdController@store');





