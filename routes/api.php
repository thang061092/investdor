<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/admin')->group(function () {
    Route::post('/create_admin', "Admin\UserController@create_admin")->name('admin.create_admin');
    Route::post('/create_config', "Admin\ConfigController@create")->name('admin.create_config');
});
