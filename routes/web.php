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


Route::get('/', 'HomeController@show')->name('/');

Route::get('/about', function () {
	return view('about');
})->name('about');


Auth::routes();
Route::get('/users', 'Profiles\UsersController@index')->name('users');
Route::patch('/users/{user}/block', 'Profiles\UsersController@block')->name('user.block');
Route::patch('/users/{user}/unblock', 'Profiles\UsersController@unblock')->name('user.unblock');
Route::patch('/users/{user}/promote', 'Profiles\UsersController@promote')->name('user.promote');
Route::patch('/users/{user}/demote', 'Profiles\UsersController@demote')->name('user.demote');
Route::patch('/me/password', 'Profiles\ProfileController@update_password')->name('update.password');
Route::get('/me/profile', 'Profiles\ProfileController@index')->name('me.profile');
Route::put('/me/profile', 'Profiles\ProfileController@update_profile')->name('update.profile');
Route::get('/profiles', 'Profiles\ProfilesController@index')->name('profiles');
Route::get('/me/associates', 'Profiles\AssociatesController@index')->name('me.associates');
Route::get('/me/associate-of', 'Profiles\AssociateOfController@index')->name('me.associate_of');


Route::get('/dashboard', 'DashboardController@index')->name('dashboard'); 

//accounts
Route::get('/accounts/{user}', 'AccountsController@fullindex')->name('accounts.index');
Route::get('/accounts/{user}/opened', 'AccountsController@openedindex')->name('accounts.opened');
Route::get('/accounts/{user}/closed', 'AccountsController@closedindex')->name('accounts.closed');
Route::delete('/account/{account}', 'AccountsController@destroy')->name('account.destroy');
Route::patch('/account/{account}/close', 'AccountsController@close')->name('account.close');
Route::patch('/account/{account}/reopen', 'AccountsController@reopen')->name('account.reopen');
Route::post('/account/', 'AccountsController@create')->name('account.create');
Route::put('/account/{account}', 'AccountsController@edit')->name('account.edit');

//movements
Route::get('/movements/{account}', 'MovementsController@index')->name('movements');
Route::get('movements/{account}/create', 'MovementsController@create')->name('movements.create');
Route::post('movements/{account}/create', 'MovementsController@store')->name('movements.store');
Route::get('movement/{movement}', 'MovementsController@edit')->name('movements.edit');
Route::put('movement/{movement}', 'MovementsController@update')->name('movements.update');
Route::delete('movement/{movement}', 'MovementsController@destroy')->name('movements.destroy');



//Documents



                 