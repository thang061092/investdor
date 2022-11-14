<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BaseController;
use App\Http\Services\ContractService;
use Illuminate\Http\Request;

class ContractController extends BaseController
{
    protected $contractService;

    public function __construct(ContractService $contractService)
    {
        $this->contractService = $contractService;
    }

    public function index(Request $request)
    {
        $request->type_query = 'get';
        $contracts = $this->contractService->get_list($request);
        return view('employee.contract.list', compact('contracts'));
    }
}
