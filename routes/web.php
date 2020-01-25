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

Auth::routes([
    'verify'    => false,
    'register'  => false,
]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('users', 'UserController');
    Route::get('/change-password', 'UserController@showChangePasswordForm');
    Route::post('/change-password', 'UserController@changePassword')->name('change-password');
    Route::resource('products', 'ProductController');
    Route::resource('orders', 'OrderController');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
