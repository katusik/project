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
    Route::get('/update-password', 'UpdatePasswordController@index')->name('editPassword');
    Route::post('update-password', 'UpdatePasswordController@update')->name('updatePassword');
    Route::get('/update-email', 'UpdateEmailController@index')->name('editEmail');
    Route::post('update-email', 'UpdateEmailController@index')->name('updateEmail');
    Route::post('destroy/{id}', 'UserController@destroyAvatar')->name('destroyAvatar');
    Route::resource('profile', 'UserController');
});



