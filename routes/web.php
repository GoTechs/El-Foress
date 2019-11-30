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

Route::get('/search/{idcat}/{idsouscat}','searchController@searchPerSousCat');
Route::get('/search/{idcat}','searchController@searchPerCat');

Route::get('/contact', 'ContactFormController@create');
Route::post('/contact', 'ContactFormController@store');


Route::get('/faq', function () {
    return view('faq');
});

Route::get('/a-propos', 'categorieController@apropos');

// Route for Authentication

Route::get('/inscription','AuthController@create');
Route::post('/inscription','AuthController@store');

Route::get('/connexion','AuthController@connexion')->name('connexion');
Route::post('/connexion','AuthController@checklogin');

Route::get('/logout','AuthController@logout')->middleware('auth');


// Route to Profil

Route::get('/home','ProfilController@home')->middleware('auth');
Route::get('/my-ads','ProfilController@myads')->middleware('auth');
Route::get('/favorites','ProfilController@favorits')->middleware('auth');
Route::get('/archives','ProfilController@archives')->middleware('auth');

// Dynamic dropDown Categorie And Sous categorie

Route::get('/add-Ad','categorieController@categories')->middleware('auth');

Route::get('/json-sousCategorie','categorieController@sousCat')->middleware('auth');

// Insert Ad

Route::post('/insertAd','insertAdController@store')->middleware('auth');

// Update and Delete Ad

Route::get('/update-AD/{idpost}/edit','insertAdController@edit')->middleware('auth');
Route::patch('/update-AD/{idpost}','insertAdController@update')->middleware('auth');
Route::delete('/update-AD/{idpost}','insertAdController@destroy')->middleware('auth');
Route::delete('/deleteAll','insertAdController@deleteAll')->middleware('auth');

// Archived AD

Route::patch('/archiveAd/{idpost}','ProfilController@update')->middleware('auth');
Route::patch('/repostAd/{idpost}','ProfilController@repost')->middleware('auth');

// Update Personnel Info of USER

Route::patch('/updateInfoUser/{idpost}','ProfilController@updateUser')->middleware('auth');

// Adding Ad to my favorits

Route::patch('/addtofav/{idpost}','ProfilController@addtofav');

// Remove from my favorits

Route::delete('/deleteFav/{idpost}','ProfilController@deleteFav')->middleware('auth');
Route::delete('/deleteAllFav','ProfilController@deleteallFav')->middleware('auth');


// Details of ads

Route::get('/details/{idpost}','searchController@details');
Route::get('/my-ads/details/{idpost}','searchController@myAdsDetails')->middleware('auth');

// Advanced Search route

Route::get('/advanced-Search','advancedSearchController@search');


// Password Operation

Route::group(['prefix' => 'admin','namespace' => 'Auth'],function(){
    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm');
    Route::post('password/reset', 'ResetPasswordController@reset');
});

// Update User Password

Route::patch('/updatePassword/{idpost}','ProfilController@updatePassword')->middleware('auth');

