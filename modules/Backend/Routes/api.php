<?php

use Illuminate\Http\Response;
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
Route::group(['middleware' => 'locale_be'], function () {
    Route::prefix('/backend')->group(function () {
        Route::get('/', function () {
            echo 'welcome investdor Backend - test';
        });
    });

    Route::prefix('/user')->group(function () {
        Route::post('/create_admin', 'UserController@create_admin');
        Route::post('/create_employee', 'UserController@create_employee');
        Route::post('/customer_register', 'UserController@customer_register');
        Route::post('/login_social', 'UserController@login_social');
    });
});
