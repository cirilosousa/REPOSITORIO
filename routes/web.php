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
//register
Route::get('/register', 'RegistersController@index');
Route::post('/register', 'RegistersController@index');
Route::post('/login', function() {
	return view('login');
});
//sem estar autenticado
Auth::routes();
//após autenticar

//Users
Route::get('/users', 'UsersController@index')->name('users');
Route::patch('/users/{user}/block', 'UsersController@block')->name('user.block');
Route::patch('/users/{user}/unblock', 'UsersController@unblock')->name('user.unblock');
Route::patch('/users/{user}/promote', 'UsersController@promote')->name('user.promote');
<<<<<<< HEAD
Route::patch('/users/{user}/demote', 'UsersController@demote')->name('user.demote');

//Me
//Route::patch('/me/password', 'MeController@password')->name('me.profile');
//Route::put('/me/profile', 'MeController@index');
=======
Route::patch('/users/{user}/demote', 'UsersControl\ler@demote')->name('user.demote');
//Route::get('/me/profile', 'MyProfileController@index')->name('me.profile');
>>>>>>> 77e4c81489c1244c4bda04e5c35c2a8ddb10af9c
Route::get('/profiles', 'ProfilesController@index')->name('profiles');
//Route::get('/me/associates', 'MeController@index')->name('me.associates');
//Route::get('/me/associate-of', 'MeController@index')->name('me.associate-of');

//Accounts


//Movements


//Documents

Route::get('/dashbord', 'DashboardController@index')->name('dashboard'); 
Route::get('/home', 'HomeController@index')->name('home');
                


                 