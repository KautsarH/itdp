<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/dashboard_pm', 'DashboardController@dashboardpm')->name('dashboard_pm');
Route::get('/listParti', 'ProjectMgrController@index')->name('pm.listParti');

Route::resource('users', 'UserController');

Route::get('/users','UserController@index')->name('user.index')->middleware('auth');
// Route::get('/user/create','UserController@create')->name('user.create')->middleware('auth');
// Route::post('/user','UserController@store')->name('user.store')->middleware('auth');
Route::get('/user/{user}','UserController@show')->name('user.show')->middleware('auth');
// Route::get('/user/{user}/edit','UserController@edit')->name('user.edit')->middleware('auth');
// Route::put('/user/{user}','UserController@update')->name('user.update')->middleware('auth');
// Route::delete('/user/{user}','UserController@destroy')->name('user.destroy')->middleware('auth');

Route::get('/events','EventController@index')->name('event.index')->middleware('auth');
Route::get('/event/create','EventController@create')->name('event.create')->middleware('auth');
Route::post('/event','EventController@store')->name('event.store')->middleware('auth');
Route::get('/event/{event}','EventController@show')->name('event.show')->middleware('auth');
Route::get('/event/{event}/edit','EventController@edit')->name('event.edit')->middleware('auth');
Route::put('/event/{event}','EventController@update')->name('event.update')->middleware('auth');
Route::delete('/event/{event}','EventController@destroy')->name('event.destroy')->middleware('auth');
