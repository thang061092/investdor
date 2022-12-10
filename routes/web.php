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
    Route::post('/otp_register', "Customer\AuthController@otp_register")->name('customer.otp_register');
    Route::post('/send_email_forgot_pass', "Customer\AuthController@send_email_forgot_pass")->name('customer.send_email_forgot_pass');
    Route::post('/new_password_post', "Customer\AuthController@new_password_post")->name('customer.new_password_post');
    Route::get('/forgot_password', "Customer\AuthController@forgot_password")->name('customer.re_password');
    Route::get('/new_password', "Customer\AuthController@new_password")->name('customer.new_password');
    Route::get('/google_redirect', "Customer\AuthController@google_redirect")->name('customer.google_redirect');
    Route::get('/google_callback', "Customer\AuthController@google_callback")->name('customer.google_callback');

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

        Route::prefix('/investment')->group(function () {
            Route::get('/step1/{slug}', "Customer\InvestmentController@step1")->name('investment.step1');
            Route::post('/step2', "Customer\InvestmentController@step1_submit")->name('investment.step1_submit');
            Route::get('/step2/{slug}', "Customer\InvestmentController@step2")->name('investment.step2');
            Route::post('/step3', "Customer\InvestmentController@step2_submit")->name('investment.step2_submit');
            Route::get('/step3/{slug}', "Customer\InvestmentController@step3")->name('investment.step3');
            Route::post('/step4', "Customer\InvestmentController@step3_submit")->name('investment.step3_submit');
            Route::get('/step4/{slug}', "Customer\InvestmentController@step4")->name('investment.step4');
        });

        // Route::post('/question','Customer\UserController@question')->name('question');

    });

    //employee
    Route::prefix('/admin')->group(function () {
        Route::get('/', "Admin\UserController@login")->name('admin');
        Route::post('/login', "Admin\UserController@employee_login")->name('admin.login');
        Route::post('/create_admin', "Admin\UserController@create_admin")->name('admin.create_admin');

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
                Route::post('/add_document', "Admin\ProjectController@add_document")->name('project.add_document');
                Route::post('/edit_document', "Admin\ProjectController@update_document")->name('project.update_document');
                Route::get('/show_document/{id}', "Admin\ProjectController@show_document")->name('project.show_document');
                Route::post('/add_member_company', "Admin\ProjectController@add_member_company")->name('project.add_member_company');
                Route::post('/update_post/{id}', "Admin\ProjectController@update_post")->name('project.update_post');
                Route::post('/update_status_project/{id}', "Admin\ProjectController@update_status_project")->name('project.update_status_project');
                Route::post('/add_plan', "Admin\ProjectController@add_plan")->name('project.add_plan');
                Route::get('/show_plan/{id}', "Admin\ProjectController@show_plan")->name('project.show_plan');
                Route::post('/update_plan', "Admin\ProjectController@update_plan")->name('project.update_plan');
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
                Route::get('/list_news', 'Admin\UserController@list_news')->name('customer.employee.list_news');
                Route::get('/create_news', 'Admin\UserController@create_news')->name('customer.employee.create_news');
                Route::post('/save_news', 'Admin\UserController@save_news')->name('customer.employee.save_news');
                Route::post('/update_status_news', 'Admin\UserController@update_status_news')->name('customer.employee.update_status_news');
                Route::get('/edit_news/{id}', 'Admin\UserController@edit_news')->name('customer.employee.edit_news');
                Route::post('/update_news/{id}', 'Admin\UserController@update_news')->name('customer.employee.update_news');
                Route::get('/detail_news/{id}', 'Admin\UserController@detail_news')->name('customer.employee.detail_news');
                Route::get('/list_category', 'Admin\UserController@list_category')->name('customer.employee.list_category');
                Route::get('/create_category', 'Admin\UserController@create_category')->name('customer.employee.create_category');
                Route::post('/save_category', 'Admin\UserController@save_category')->name('customer.employee.save_category');
                Route::get('/edit_category/{id}', 'Admin\UserController@edit_category')->name('customer.employee.edit_category');
                Route::post('/update_category/{id}', 'Admin\UserController@update_category')->name('customer.employee.update_category');
                Route::get('/detail_category/{id}', 'Admin\UserController@detail_category')->name('customer.employee.detail_category');
                Route::post('/update_status_category', 'Admin\UserController@update_status_category')->name('customer.employee.update_status_category');
                Route::get('/list_question','Admin\UserController@list_question')->name('list_question');
                Route::get('/detail/{id}', 'Admin\UserController@detail_question')->name('detail_question');
                Route::post('/send_answer/{id}','Admin\UserController@send_answer')->name('send_answer');
                Route::post('/question', 'Customer\UserController@question')->name('question');
                Route::post('/change_password/{id}', 'Admin\UserController@change_password')->name('change_password');
            });

            Route::prefix('/customer')->group(function () {
                Route::get('/get_all', 'Admin\UserController@get_all_customer')->name('customer.customer.get_all');
                Route::get('/detail_customer/{id}', 'Admin\UserController@detail_customer')->name('customer.customer.detail_customer');
                Route::get('/edit_customer/{id}', 'Admin\UserController@edit_customer')->name('customer.customer.edit_customer');
                Route::post('/update_customer/{id}', 'Admin\UserController@update_customer')->name('customer.customer.update_customer');
                Route::post('/auth/{id}', 'Admin\UserController@auth')->name('customer.customer.auth');
                Route::post('/not_auth/{id}', 'Admin\UserController@not_auth')->name('customer.customer.not_auth');
                Route::post('/question','Customer\UserController@question')->name('customer.question');
            });

            Route::prefix('/transaction')->group(function () {
                Route::get('/wait', "Admin\TransactionController@wait_pay")->name('transaction.wait_pay');
                Route::get('/get_bill/{id}', "Admin\TransactionController@get_bill")->name('transaction.get_bill');
                Route::post('/update_bill', "Admin\TransactionController@update_bill")->name('transaction.update_bill');
                Route::get('/list', "Admin\TransactionController@index")->name('transaction.index');
                Route::post('/payment_contract', "Admin\TransactionController@payment_contract")->name('transaction.payment_contract');
            });

            Route::prefix('/contract')->group(function () {
                Route::get('/list', "Admin\ContractController@index")->name('contract.index');
                Route::get('/detail/{id}', "Admin\ContractController@detail")->name('contract.detail');
            });

            Route::prefix('/menu')->group(function () {
                Route::get('/list', "Admin\MenuController@index")->name('menu.index');
                Route::post('/create', "Admin\MenuController@create")->name('menu.create');
                Route::post('/get_menu_add_role', "Admin\MenuController@get_menu_add_role");
            });

            Route::prefix('/group')->group(function () {
                Route::get('/list', "Admin\GroupRoleController@index")->name('group.index');
                Route::get('/create', "Admin\GroupRoleController@create")->name('group.create');
                Route::post('/store', "Admin\GroupRoleController@store")->name('group.store');
                Route::get('/detail/{id}', "Admin\GroupRoleController@detail")->name('group.detail');
                Route::post('/update', "Admin\GroupRoleController@update")->name('group.update');
            });

            Route::prefix('/user')->group(function () {
                Route::post('/get_user_add_role', "Admin\UserController@get_user_add_role");
                Route::post('/update_role_employee', "Admin\UserController@update_role_employee");
            });

            Route::prefix('/role')->group(function () {
                Route::get('/list', "Admin\RoleController@index")->name('role.index');
                Route::post('/create', "Admin\RoleController@create")->name('role.create');
                Route::post('/get_action_add_user', "Admin\RoleController@get_action_add_user")->name('role.get_action_add_user');
                Route::get('/role_employee/{id}', "Admin\UserController@role_employee")->name('role.role_employee');
            });

        });
    });

    Route::post('/upload', "UploadController@upload");
    Route::post('/sendMail', "SendMailController@sendMail");
    Route::post('/qr', "Customer\PaymentController@link");
    Route::prefix('/address')->group(function () {
        Route::get('/district', "Admin\AddressController@district");
        Route::get('/ward', "Admin\AddressController@ward");
    });
});

