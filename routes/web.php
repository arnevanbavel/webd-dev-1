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
    return view('welcome');
});

//Registration 
Route::post('/register','Auth\RegisterController@register');

//Code
Route::get('/home', 'HomeController@index')->name('home');
Route::post('home/submit', array('as' => 'code', 'uses' => 'CodeController@store'));

//Dashboard
Route::get('/dashboard', 'DashboardController@show');
Route::post('/dashboard/submit/valid', 'DashboardController@addValidCode');
Route::post('/dashboard/submit/winning', 'DashboardController@addWinningCode');



Auth::routes();

Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');
