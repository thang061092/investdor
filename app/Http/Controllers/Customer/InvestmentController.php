<?php


namespace App\Http\Controllers\Customer;


use App\Http\Controllers\BaseController;
use App\Http\Services\CityService;
use App\Http\Services\RealEstateProjectService;
use App\Http\Services\VietQr;
use Illuminate\Http\Request;

class InvestmentController extends BaseController
{
    protected $cityService;
    protected $realEstateProjectService;
    protected $vietQr;

    public function __construct(CityService $cityService,
                                RealEstateProjectService $realEstateProjectService,
                                VietQr $vietQr)
    {
        $this->cityService = $cityService;
        $this->realEstateProjectService = $realEstateProjectService;
        $this->vietQr = $vietQr;
    }

    public function step1($slug)
    {
        $project = $this->realEstateProjectService->detail_project($slug);
        return view('customer.investment.step1', compact('project'));
    }

    public function step2($slug)
    {
        $project = $this->realEstateProjectService->detail_project($slug);
        return view('customer.investment.step2', compact('project'));
    }

    public function step3($slug)
    {
        $project = $this->realEstateProjectService->detail_project($slug);
        return view('customer.investment.step3', compact('project'));
    }

    public function step4($slug)
    {
        $project = $this->realEstateProjectService->detail_project($slug);
        return view('customer.investment.step4', compact('project'));
    }
}
