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

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('customers', 'CustomerController');
    Route::get('/manage', 'ManageProfileController@index')->name('manage');
    Route::post('manage', 'ManageProfileController@update')->name('manageProfile');
    Route::post('destroy/{id}', 'UserController@destroyAvatar')->name('destroyAvatar');
    Route::resource('profile', 'UserController');
});



