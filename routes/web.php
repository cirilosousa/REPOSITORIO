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

Auth::routes();
Route::get('/users', 'UsersController@index')->name('users');
Route::patch('/users/{user}/block', 'UsersController@block')->name('user.block');
Route::patch('/users/{user}/unblock', 'UsersController@unblock')->name('user.unblock');
Route::patch('/users/{user}/promote', 'UsersController@promote')->name('user.promote');
Route::patch('/users/{user}/demote', 'UsersController@demote')->name('user.demote');
//Route::get('/me/profile', 'MyProfileController@index')->name('me.profile');
Route::get('/profiles', 'ProfilesController@index')->name('profiles');
//Route::get('/me/associates', 'AssociatesController@index')->name('me.associates');
//Route::get('/me/associate-of', 'AssociateOfController@index')->name('me.associate-of');


Route::get('/dashbord', 'DashbordController@index')->name('dashbord'); 
Route::get('/home', 'HomeController@index')->name('home');




                 