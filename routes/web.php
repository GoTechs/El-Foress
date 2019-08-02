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

Route::get('/inscription','AuthController@create');
Route::post('/inscription','AuthController@store');

Route::get('/connexion','AuthController@connexion');
Route::post('/connexion','AuthController@checklogin');


