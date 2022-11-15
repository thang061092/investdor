<?php


namespace App\Http\Controllers\Customer;


use App\Http\Controllers\BaseController;
use App\Http\Services\BillsService;
use App\Http\Services\CityService;
use App\Http\Services\RealEstateProjectService;
use App\Http\Services\VietQr;
use Illuminate\Http\Request;

class InvestmentController extends BaseController
{
    protected $cityService;
    protected $realEstateProjectService;
    protected $vietQr;
    protected $billsService;

    public function __construct(CityService $cityService,
                                RealEstateProjectService $realEstateProjectService,
                                VietQr $vietQr,
                                BillsService $billsService)
    {
        $this->cityService = $cityService;
        $this->realEstateProjectService = $realEstateProjectService;
        $this->vietQr = $vietQr;
        $this->billsService = $billsService;
    }

    public function step1($slug)
    {
        $project = $this->realEstateProjectService->detail_project($slug);
        return view('customer.investment.step1', compact('project'));
    }

    public function step1_submit(Request $request)
    {
        $project = $this->realEstateProjectService->find($request->project_id);
        $bill = $this->billsService->create_step1($request);
        $str = $project['id'] . '+' . $bill['id'] . '+' . uniqid();
        $checksum = encode($str, env('KEY_ENCRYPT'));
        return view('customer.investment.step2', compact('project', 'bill', 'checksum'));
    }

    public function step2_submit(Request $request)
    {
        $checksum = decode($request->checksum, env('KEY_ENCRYPT'));
        $arr = explode('+', $checksum);
        $project = $this->realEstateProjectService->find($arr[0]);
        $bill = $this->billsService->create_step2($request, $project, $arr[1]);
        $str = $project['id'] . '+' . $bill['id'] . '+' . uniqid();
        $checksum_new = encode($str, env('KEY_ENCRYPT'));
        return view('customer.investment.step3', compact('project', 'bill', 'checksum_new'));
    }

    public function step3_submit(Request $request)
    {
        $checksum = decode($request->checksum, env('KEY_ENCRYPT'));
        $arr = explode('+', $checksum);
        $bill = $this->billsService->create_step3($arr[1]);
        return view('customer.investment.step4', compact('bill'));
    }
}
