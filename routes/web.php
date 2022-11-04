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
        Route::get('/dashboard', "TemplateController@dashboard");
        Route::get('/inputs', "TemplateController@inputs");
        Route::get('/tempalte-mail-co-hoi-dau-tu', "TemplateController@investmail");
        Route::get('/tempalte-mail-thong-bao-dau-tu', "TemplateController@notificationinvest");
        Route::get('/tempalte-mail-thong-bao-dau-tu-thanh-cong', "TemplateController@notificationinvestsuccess");
        Route::get('/inputs', "TemplateController@inputs");
    });

    //customer
    Route::get('/login', "Customer\AuthController@login")->name('customer.login');
    Route::post('/login_submit', "Customer\AuthController@login_submit")->name('customer.login_submit');
    Route::get('/register', "Customer\AuthController@register")->name('customer.register');
    Route::post('/register_submit', "Customer\AuthController@register_submit")->name('customer.register_submit');

    Route::get('/', "Customer\HomeController@index")->name('home.index');
    Route::get('/home-page', "Customer\HomeController@home_page")->name('customer.home_page');
    Route::get('/knowledge', "Customer\HomeController@knowledge")->name('customer.knowledge');
    Route::get('/detail_project', "Customer\HomeController@detail_project")->name('customer.detail_project');

    Route::group(['middleware' => 'auth_customer'], function () {
        Route::get('/logout', "Customer\AuthController@logout")->name('customer.logout');

        Route::prefix('/customer')->group(function () {
            Route::prefix('/user')->group(function () {
                Route::get('/manager', 'Customer\UserController@manager')->name('customer.user.manager');
                Route::post('/update_profile', 'Customer\UserController@update_profile')->name('customer.user.update_profile');
                Route::post('/district', 'Customer\UserController@get_district_by_province')->name('customer.user.district');
                Route::post('/ward', 'Customer\UserController@get_ward_by_district')->name('customer.user.ward');
            });
        });

    });

    //employee
    Route::prefix('/admin')->group(function () {
        Route::get('/', "Admin\UserController@login")->name('admin');
        Route::post('/login', "Admin\UserController@employee_login")->name('admin.login');
        Route::get('/logout', "Admin\UserController@logout")->name('admin.logout');

        Route::prefix('/dashboard')->group(function () {
            Route::get('/', "Admin\DashboardController@index")->name('dashboard');
        });

        Route::prefix('/project')->group(function () {
            Route::get('/create', "Admin\ProjectController@index_create_project")->name('project.create');
            Route::post('/create_project', "Admin\ProjectController@create_new_project")->name('create.create_project');
        });
    });


    Route::post('/upload', "UploadController@upload");
});

