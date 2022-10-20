<?php


namespace App\Http\Controllers\Customer;


use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    public function index(Request $request)
    {
        return view('customer.home.index');
    }
}
