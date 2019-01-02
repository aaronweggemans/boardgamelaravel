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

Auth::routes();

Route::resource('/battles', 'BattleController', [
    'only' => ['index', 'create', 'store']
]);
Route::resource('/scores', 'ScoreController', [
    'only' => ['index']
]);
Route::resource('/games', 'GameController');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/', 'PagesController@index');

Route::get('/account_details', 'PagesController@account_details');

Route::get('/users', 'PagesController@users');

Route::get('/auth', 'PagesController@auth');

/******************************AJAX Call*******************************/
Route::post('/retrieve/games/{id}/', 'PagesController@retrieve_games');
Route::post('/retrieve/users/', 'PagesController@retrieve_users');