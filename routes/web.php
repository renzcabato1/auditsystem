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


Auth::routes();
Route::group( ['middleware' => 'auth'], function()
{
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/users','AccountController@viewUsers');
    Route::post('/change-password','AccountController@changePassword');
    Route::post('/add-account','AccountController@newAccount');
    Route::post('/edit-account/{id}','AccountController@editAccount');
    Route::get('/reset-account/{id}','AccountController@resetPassword');
    Route::get('/remove-account/{id}','AccountController@removeAccount');
}
);

