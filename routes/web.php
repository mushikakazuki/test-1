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
    return view('usersinki');
});

/* Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register'); */
Route::get('/itirans','App\Http\Controllers\ItiranController@userlogin')->name('itirans.userlogin');
Route::get('/itirans','App\Http\Controllers\ItiranController@usersinki')->name('itirans.usersinki');
Route::post('/usersinki', 'UsersinkiController@method')->name('usersinki');


Route::get('/itirans','App\Http\Controllers\ItiranController@index')->name('itirans.index');


Route::get('/itirans/create', 'App\Http\Controllers\ItiranController@create')->name('itiran.create');
Route::post('/itirans/store', 'App\Http\Controllers\ItiranController@store')->name('itiran.store');

Route::get('/itirans/edit/{itiran}', 'App\Http\Controllers\ItiranController@edit')->name('itiran.edit');
Route::put('/itirans/edit/{itiran}', 'App\Http\Controllers\ItiranController@update')->name('itiran.update');

Route::get('/itirans/show/{itiran}', 'App\Http\Controllers\ItiranController@show')->name('itiran.show');

Route::delete('/itirans/destroy/{itiran}', 'App\Http\Controllers\ItiranController@destroy')->name('itiran.destroy');

//Route::get('/itirans/search/{itiran}', 'App\Http\Controllers\ItiranController@search')->name('itiran.search');
//Route::get('/itiran/search', 'ItiranController@search')->name('itiran.search');
Route::get('/itiran/search', 'App\Http\Controllers\ItiranController@search')->name('itiran.search');
