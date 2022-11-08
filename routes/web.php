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
    Route::get('/detail-project/{slug}', "Customer\HomeController@detail_project")->name('customer.detail_project');

    Route::group(['middleware' => 'auth_customer'], function () {
        Route::get('/logout', "Customer\AuthController@logout")->name('customer.logout');

        Route::prefix('/customer')->group(function () {
            Route::prefix('/user')->group(function () {
                Route::get('/manager', 'Customer\UserController@manager')->name('customer.user.manager');
                Route::post('/update_profile', 'Customer\UserController@update_profile')->name('customer.user.update_profile');
                Route::post('/district', 'Customer\UserController@get_district_by_province')->name('customer.user.district');
                Route::post('/ward', 'Customer\UserController@get_ward_by_district')->name('customer.user.ward');
                Route::post('/auth', 'Customer\UserController@auth')->name('customer.user.auth');
            });
        });

    });

    //employee
    Route::prefix('/admin')->group(function () {
        Route::get('/', "Admin\UserController@login")->name('admin');
        Route::post('/login', "Admin\UserController@employee_login")->name('admin.login');

        Route::group(['middleware' => 'auth_admin'], function () {
            Route::get('/logout', "Admin\UserController@logout")->name('admin.logout');

            Route::prefix('/dashboard')->group(function () {
                Route::get('/', "Admin\DashboardController@index")->name('dashboard');
            });

            Route::prefix('/project')->group(function () {
                Route::get('/list', "Admin\ProjectController@list")->name('project.list');
                Route::get('/tem', "Admin\ProjectController@index_create_project")->name('project.tem');
                Route::get('/create', "Admin\ProjectController@create")->name('project.create');
                Route::post('/create_project', "Admin\ProjectController@create_post")->name('project.create_post');
                Route::get('/action/{id}', "Admin\ProjectController@action")->name('project.action');
                Route::post('/upload_image', "Admin\ProjectController@upload_image")->name('project.upload_image');
                Route::post('/update_extend', "Admin\ProjectController@update_extend")->name('project.update_extend');
                Route::post('/update_asset', "Admin\ProjectController@update_asset")->name('project.update_asset');
                Route::post('/update_investor', "Admin\ProjectController@update_investor")->name('project.update_investor');
            });

            Route::prefix('/interest')->group(function () {
                Route::post('/create', "Admin\InterestController@create")->name('interest.create');
            });

            Route::prefix('/employee')->group(function () {
                Route::get('/get_all', 'Admin\UserController@get_all_employee')->name('customer.employee.get_all');
                Route::get('/detail_employee/{id}', 'Admin\UserController@detail_employee')->name('customer.employee.detail_employee');
                Route::get('/store_employee', 'Admin\UserController@store_employee')->name('customer.employee.store_employee');
                Route::post('/create_employee', 'Admin\UserController@create_employee')->name('customer.employee.create_employee');
                Route::get('/edit_employee/{id}', 'Admin\UserController@edit_employee')->name('customer.employee.edit_employee');
                Route::post('/update_employee/{id}', 'Admin\UserController@update_employee')->name('customer.employee.update_employee');
                Route::post('/update_status', 'Admin\UserController@update_status')->name('customer.employee.update_status');
            });

            Route::prefix('/customer')->group(function () {
                Route::get('/get_all', 'Admin\UserController@get_all_customer')->name('customer.customer.get_all');
                Route::get('/detail_customer/{id}', 'Admin\UserController@detail_customer')->name('customer.customer.detail_customer');
                Route::get('/edit_customer/{id}', 'Admin\UserController@edit_customer')->name('customer.customer.edit_customer');
                Route::post('/update_customer/{id}', 'Admin\UserController@update_customer')->name('customer.customer.update_customer');
                Route::post('/auth/{id}','Admin\UserController@auth')->name('customer.customer.auth');
                Route::post('/not_auth/{id}','Admin\UserController@not_auth')->name('customer.customer.not_auth');
            });
        });
    });

    Route::post('/upload', "UploadController@upload");
    Route::prefix('/address')->group(function () {
        Route::get('/district', "Admin\AddressController@district");
        Route::get('/ward', "Admin\AddressController@ward");
    });
});

