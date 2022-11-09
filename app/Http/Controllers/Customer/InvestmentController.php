<?php


namespace App\Http\Controllers\Customer;


use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class InvestmentController extends BaseController
{
    public function investment(Request $request)
    {
        return view('customer.investment.step1');
    }
}
