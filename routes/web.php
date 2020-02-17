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


Route::get('/', 'HomeController@index')->name('home');


Route::get('/about', 'HomeController@about');
Route::get('/trips/search', 'traveler\TripController@search')->name('my_trip');

Route::group(['middleware'=>'auth'],function () {
    Route::get('/trips', 'traveler\TripController@show');
});

Auth::routes();

/*///////////// Traveler Section //////////////*/

Route::group(['middleware' => 'traveler'], function() {
    Route::resource('/', 'traveler\TravelerController');
});
/////////// End of Traveler section //////////////

/*///////////// Agent Section //////////////*/

Route::group(['prefix' => 'agent', 'middleware' => 'agent'], function() {
    Route::resource('dashboard', 'agent\AgentController');
});
/////////// End of Agent section //////////////



/*///////////// Admin Section //////////////*/

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::resource('dashboard', 'admin\AdminController');
});
/////////// End of Admin section //////////////



//Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
