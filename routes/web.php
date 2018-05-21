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

//register
//Route::get('/register', 'UsersController@index');
//Route::post('/register', 'UsersController@store');

//login
//Route::get('/login', 'UsersController@index');


//Users
Route::get('/users', 'UsersController@index');
Route::get('/users/{user}/block', 'UsersController@block');
//Route::patch('/users/{user}/unblock, 'UsersController@unblock);
//Route::patch('/users/{user}/promote, 'UsersController@promote');
//Route::patch('/users/{user}/demote, 'UsersController@demote');

//me
//Route::patch('/me/password',...);
//Route::put('/me/profile',...);
//Route::get('/me/associate',...);
//Route::post('/me/associates',...);
//Route::get('/me/associate-of',...);
//Route::delete('/me/associates/{user}',...);

//profiles
//Route::get('/profiles',...);

//Accounts
//Route::get('/accounts/{user}', 'AccountController@index');
//Route::get('/accounts/{user}/opened', 'AccountController@index');
//Route::get('/accounts/{user}/closed', 'AccountController@index');
//Account
//Route::delete('/account/{accounts}', 'AccountController@delete');
//Route::patch('/account/{accounts}/close', 'AccountController@index');
//Route::patch('/account/{accounts}/reopen', 'AccountController@index');
//Route::post('/account', 'AccountController@index');
//Route::put('/account/{account}', 'AccountController@index');

//Movements
//Route::get('/movements/{account}/create', 'MovementsController@index');
//Route::post('/movements/{account}/create', 'MovementsController@index');
//Movement
//Route::get('/movement/{movement}', 'MovementController@index');
//Route::put('/movement/{movement}', 'MovementController@index');
//Route::delete('/movement/{movement}', 'MovementController@index');

//Documents
//Route::post('/documents/{movement}', 'DocumentsController@index');
//Document
//Route::delete('/document/{document}', 'DocumentsController@index');
//Route::get('/document/{document}', 'DocumentsController@index');

//Dashboard
//Route::get('/dashboard/{user}', '???@index');

//Route::delete('/document/{document}', 'DocumentsController@index');


//About
Route::get('/about', function () {
	return view('about');
});









