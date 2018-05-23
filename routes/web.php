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
Route::get('/users', 'Profiles\UsersController@index')->name('users');
Route::patch('/users/{user}/block', 'Profiles\UsersController@block')->name('user.block');
Route::patch('/users/{user}/unblock', 'Profiles\UsersController@unblock')->name('user.unblock');
Route::patch('/users/{user}/promote', 'Profiles\UsersController@promote')->name('user.promote');
Route::patch('/users/{user}/demote', 'Profiles\UsersController@demote')->name('user.demote');
//Route::get('/me/profile', 'MyProfileController@index')->name('me.profile');
Route::get('/profiles', 'Profiles\ProfilesController@index')->name('profiles');
//Route::get('/me/associates', 'AssociatesController@index')->name('me.associates');
//Route::get('/me/associate-of', 'AssociateOfController@index')->name('me.associate-of');




//Movements


//Documents

Route::get('/dashboard', 'DashboardController@index')->name('dashboard'); 

                

Route::get('/dashbord', 'DashbordController@index')->name('dashbord'); 
Route::get('/home', 'HomeController@index')->name('home');

//movements
//oute::get('/movements/{account}', )



                 