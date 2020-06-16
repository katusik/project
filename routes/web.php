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

//Route::get('/', function () {
//   return view('welcome');
//});


Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'HomeController@index')->name('home');

    Route::get('customer-tours/{id}', 'CustomerController@showTour')->name('showTour');
    Route::post('customer-tours}', 'CustomerController@addTour')->name('addTour');
    Route::resource('customers', 'CustomerController');

    Route::get('/tours', 'TourController@index')->name('tour');
    Route::get('/tours/{id}', 'TourController@showCustomer')->name('showCustomer');
    Route::post('tours-customer', 'TourController@addCustomer')->name('addCustomer');

    Route::get('application', 'ApplicationController@index')->name('application');


    Route::resource('admin-tour', 'AdminTourController')->middleware('can:isAdmin');

//    Route::get('/update-password', 'UpdatePasswordController@index')->middleware('can:isAdmin')->name('editPassword');
    Route::get('/update-password', 'UpdatePasswordController@index')->name('editPassword');
    Route::post('update-password', 'UpdatePasswordController@update')->name('updatePassword');
    Route::post('destroy/{id}', 'UserController@destroyAvatar')->name('destroyAvatar');
    Route::resource('profile', 'UserController');
});



