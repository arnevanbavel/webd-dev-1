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
Route::get('/', 'WelcomeController@show');

Route::get('/test', function () {
	$codes = App\Code::all();
	foreach ($codes as $code ) {
		echo $code->code .'belong to' . $code->user->name;
	}

	$user = App\User::find(1);
	foreach ($user->codes as $code ) {
		echo $code->code;
	}

    echo 'hallo'; 
});

//Registration 
Route::post('/register','Auth\RegisterController@register');

//Code
Route::get('/home', 'HomeController@index')->name('home');
Route::post('home/submit', array('as' => 'code', 'uses' => 'CodeController@store'));

Auth::routes();

Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Route::group(['middleware' => 'Admin'], function () 
{
	//Dashboard
	Route::get('/dashboard', 'DashboardController@show');
	Route::post('/dashboard/submit/valid', 'DashboardController@addValidCode');
	Route::post('/dashboard/submit/winning', 'DashboardController@addWinningCode');
	Route::get('/dashboard/delete/{id}', 'DashboardController@destroyUser');
	Route::get('/dashboard/restore/{id}', 'DashboardController@restoreUser');
	Route::get('/excel', 'DashboardController@excel');

});
