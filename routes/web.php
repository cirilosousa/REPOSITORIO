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

Route::get('/', function () {
	return view('welcome');
});


Route::get('/about', function() {
	return view('about');
})->name('about');
//sem estar autenticado

//após autenticar

//Users
Route::get('/users', 'Profiles\UsersController@index')->name('users');
Route::patch('/users/{user}/block', 'Profiles\UsersController@block')->name('user.block');
Route::patch('/users/{user}/unblock', 'Profiles\UsersController@unblock')->name('user.unblock');
Route::patch('/users/{user}/promote', 'Profiles\UsersController@promote')->name('user.promote');
Route::patch('/users/{user}/demote', 'Profiles\UsersController@demote')->name('user.demotes');
Route::get('/profiles', 'Profiles\ProfilesController@index')->name('profiles');
//Route::get('/me/associates', 'MeController@index')->name('me.associates');
//Route::get('/me/associate-of', 'MeController@index')->name('me.associate-of');

//Accounts


//Movements


//Documents

Route::get('/dashboard', 'DashboardController@index')->name('dashboard'); 

                


                 