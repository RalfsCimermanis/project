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

/*Route::get('/users/{id}', function ($id) {
    return $id;
});*/

Route::get('/', 'PagesController@index');
Route::get('/results', 'PagesController@results');
Route::get('/upcoming', 'PagesController@upcoming');
Route::get('/about', 'PagesController@about');

Route::resource('teams', 'TeamsController');
Route::resource('games', 'GamesController');
Route::resource('results', 'ResultsController');
Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('lang/{locale}','LanguageController');
