<?php

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

Route::group(['middleware' => 'locale'], function () {
    Route::get('/', "Customer\HomeController@index")->name('home.index');

    Route::prefix('/template')->group(function () {
        Route::get('/cackhoandautu', "TemplateController@cackhoandautu");
        Route::get('/checkotp', "TemplateController@checkotp");
        Route::get('/chitietduan', "TemplateController@chitietduan");
        Route::get('/dautu1', "TemplateController@dautu1");
        Route::get('/dautu2', "TemplateController@dautu2");
        Route::get('/dautu3', "TemplateController@dautu3");
        Route::get('/dautu4', "TemplateController@dautu4");
        Route::get('/kienthuc', "TemplateController@kienthuc");
        Route::get('/lichsudautu', "TemplateController@lichsudautu");
        Route::get('/login', "TemplateController@login");
        Route::get('/profile', "TemplateController@profile");
        Route::get('/quanlycuatoi1', "TemplateController@quanlycuatoi1");
        Route::get('/quanlycuatoi2', "TemplateController@quanlycuatoi2");
        Route::get('/quanlycuatoi3', "TemplateController@quanlycuatoi3");
        Route::get('/quenmatkhau', "TemplateController@quenmatkhau");
        Route::get('/register', "TemplateController@register");
        Route::get('/thongbao', "TemplateController@thongbao");
        Route::get('/thongtincanhan', "TemplateController@thongtincanhan");
        Route::get('/trangchu', "TemplateController@trangchu");
    });

    //customer
    Route::get('/login', "Customer\AuthController@login")->name('customer.login');
    Route::get('/register', "Customer\AuthController@register")->name('customer.register');
});

