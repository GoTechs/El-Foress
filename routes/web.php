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

Route::get('/','searchController@showCat');

Route::post('/categorie','searchController@search');
Route::get('/categorie','searchController@search');

Route::get('/search/{idpost}/{idcat}','searchController@searchPerCat');

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/Apropos', function () {
    return view('Apropos');
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

// Dynamic dropDown Categorie And Sous categorie

Route::get('/addAd','categorieController@categories');

Route::get('/json-sousCategorie','categorieController@sousCat');

// Insert Ad

Route::post('/insertAd','insertAdController@store');

// Update and Delete Ad

Route::get('/updateAD/{idpost}/edit','insertAdController@edit');
Route::patch('/updateAD/{idpost}','insertAdController@update');
Route::delete('/updateAD/{idpost}','insertAdController@destroy');

// Archived AD

Route::patch('/archiveAd/{idpost}','ProfilController@update');
Route::patch('/repostAd/{idpost}','ProfilController@repost');

// Update Personnel Info of USER

Route::patch('/updateInfoUser/{idpost}','ProfilController@updateUser');

Route::get('/details', function () {
    return view('details');
});

// LIVE SEARCH

Route::get('/search', 'eventController@liveSearch');

// Adding Ad to my favorits

Route::patch('/addtofav/{idpost}','ProfilController@addtofav');

// Details of ads

Route::get('/details/{idpost}','searchController@details');






