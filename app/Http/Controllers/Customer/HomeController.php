<?php


namespace App\Http\Controllers\Customer;


use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends BaseController
{
    public function index(Request $request)
    {
        return view('customer.home.index');
    }

    public function home_page(Request $request)
    {
        return view('customer.home.home-page');
    }
}
