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

/*///////////// Admin Section //////////////*/

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::resource('dashboard', 'admin\AdminController');
});
/////////// End of Admin section //////////////

/*///////////// Agent Section //////////////*/

Route::group(['prefix' => 'agent', 'middleware' => 'agent'], function() {
    Route::resource('dashboard', 'agent\AgentController');
});
/////////// End of Agent section //////////////

/*///////////// Traveler Section //////////////*/

Route::group(['middleware' => 'traveler'], function() {
    Route::resource('/', 'traveler\TravelerController');
});
/////////// End of Agent section //////////////


Route::get('/', 'HomeController@index');
Route::get('/about', 'HomeController@about');
Route::get('/trips/search', 'TripController@search')->name('my_trip');

Route::group(['middleware'=>'auth'],function () {
    Route::get('/trips', 'TripController@show');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
