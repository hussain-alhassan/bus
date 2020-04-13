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
Route::get('/about', 'HomeController@about')->name('about_us');

Route::get('/trips/search', 'traveler\TripController@search')->name('my_trip');
Auth::routes();

Route::group(['middleware'=>'auth'],function () {
    Route::get('/trips', 'traveler\TripController@show');
});

/*///////////// Traveler Section //////////////*/

Route::group(['middleware' => 'traveler'], function() {
    Route::resource('/travel', 'traveler\TravelerController');
});
/////// End of Traveler section //////////////


/*///////////// Agent Section //////////////*/

Route::group(['prefix' => 'agent', 'middleware' => 'agent'], function() {
    Route::resource('dashboard', 'agent\AgentController');
    Route::resource('bookings', 'agent\BookingController');
    Route::get('/profile', 'agent\AgentController@profile');
    Route::post('/profile/{agency}/update', 'agent\AgentController@update');

    Route::get('/offices', 'agent\OfficeController@showOffices');
    Route::get('/office/create', 'agent\OfficeController@create')->name('create_office');
    Route::post('/office/store', 'agent\OfficeController@store')->name('store_office');

    // office protected routes
    Route::group(['prefix' => 'office', 'middleware' => 'own.office'], function() {
        Route::get('/{office}/edit', 'agent\OfficeController@edit')->name('edit_office');
        Route::post('/{office}/update', 'agent\OfficeController@update')->name('update_office');
        Route::get('/{office}/activate', 'agent\OfficeController@activate')->name('activate_office');
        Route::get('/{office}/disable', 'agent\OfficeController@disable')->name('disable_office');
    });

    // check own office is in the same function setMainBranch()
    Route::post('/office/main-branch', 'agent\OfficeController@setMainBranch')->name('main_branch');

    // Booking
    Route::get('/{booking}/approve', 'agent\BookingController@approve')->name('approve_booking');
    Route::get('/{booking}/pend', 'agent\BookingController@pend')->name('pend_booking');
    Route::get('/{booking}/reject', 'agent\BookingController@reject')->name('reject_booking');

});
/////////// End of Agent section //////////////

/*///////////// Admin Section //////////////*/

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::resource('dashboard', 'admin\AdminController');
    Route::get('cities', 'admin\CityController@showCities')->name('cities');
    Route::get('city/create', 'admin\CityController@create');
    Route::post('city/store', 'admin\CityController@store');
    Route::get('city/{city}/edit', 'admin\CityController@edit');
    Route::post('city/{city}/update', 'admin\CityController@update');
    Route::get('city/{city}/activate', 'admin\CityController@activate');
    Route::get('city/{city}/disable', 'admin\CityController@disable');
});
/////////// End of Admin section //////////////
