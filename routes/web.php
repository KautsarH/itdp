<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
Route::get('/listEvent', 'EventController@index')->name('pm.listEvent');
Route::get('/eventList', 'EventController@listFilter')->name('event.listFilter');

Route::get('/navbar', 'LayoutController@navbar')->name('navbar');

Route::resource('users', 'UserController');

Route::get('/users','UserController@index')->name('user.index')->middleware('auth');
// Route::get('/user/create','UserController@create')->name('user.create')->middleware('auth');
// Route::post('/user','UserController@store')->name('user.store')->middleware('auth');
Route::get('/user/{user}','UserController@show')->name('user.show')->middleware('auth');
// Route::get('/user/{user}/edit','UserController@edit')->name('user.edit')->middleware('auth');
Route::post('/user','UserController@update')->name('user.update')->middleware('auth');
// Route::delete('/user/{user}','UserController@destroy')->name('user.destroy')->middleware('auth');

Route::get('/events','EventController@index')->name('event.index')->middleware('auth');
Route::get('/event/create','EventController@create')->name('event.create')->middleware('auth');
Route::post('/event','EventController@store')->name('event.store')->middleware('auth');
Route::get('/event/{event}','EventController@show')->name('event.show')->middleware('auth');
Route::get('/event/{event}/edit','EventController@edit')->name('event.edit')->middleware('auth');
Route::put('/event/{event}','EventController@update')->name('event.update')->middleware('auth');
Route::delete('/event/{event}','EventController@destroy')->name('event.destroy')->middleware('auth');

Route::get('/session','SessionController@index')->name('event.joined')->middleware('auth');
Route::get('/session/create','SessionController@create')->name('session.create')->middleware('auth');
Route::post('/session','SessionController@store')->name('session.store')->middleware('auth');
Route::get('/session/{session}','SessionController@show')->name('session.show')->middleware('auth');
Route::get('/session/{session}/edit','SessionController@edit')->name('session.edit')->middleware('auth');
Route::put('/session/{session}','SessionController@update')->name('session.update')->middleware('auth');
Route::delete('/session/{session}','SessionController@destroy')->name('session.destroy')->middleware('auth');



Route::get('/image', 'ImageController@image')->name('layouts.dashboard.Sample_abc.jpg');