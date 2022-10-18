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
            echo __('Backend::message.success');
        });
    });

    Route::prefix('/user')->group(function () {
        Route::post('/create_admin', 'Admin\UserController@create_admin');
        Route::post('/employee_login', 'Admin\UserController@employee_login');
        Route::post('/customer_register', 'Customer\UserController@customer_register');
        Route::post('/login_social', 'Customer\UserController@login_social');
        Route::post('/customer_login', 'Customer\UserController@customer_login');
    });

    //admin
    Route::group(['middleware' => 'auth_employee'], function () {
        Route::prefix('/user')->group(function () {
            Route::post('/create_employee', 'Admin\UserController@create_employee');
        });

        Route::prefix('/project')->group(function () {
            Route::post('/create_project', 'Admin\ProjectController@create_new_project');
        });
    });

    //nhà đầu tư
    Route::group(['middleware' => 'auth_investor'], function () {
        Route::prefix('/user')->group(function () {

        });
    });
});
