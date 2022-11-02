<?php


namespace App\Http\Controllers\Customer;


use App\Http\Controllers\BaseController;
use App\Http\Services\CityService;
use App\Http\Services\RealEstateProjectService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends BaseController
{
    protected $cityService;
    protected $realEstateProjectService;

    public function __construct(CityService $cityService,
                                RealEstateProjectService $realEstateProjectService)
    {
        $this->cityService = $cityService;
        $this->realEstateProjectService = $realEstateProjectService;
    }

    public function index(Request $request)
    {
        return view('customer.home.index');
    }

    public function home_page(Request $request)
    {
        $projects = $this->realEstateProjectService->list_project_investor($request);
        return view('customer.home.home-page', compact('projects'));
    }

    public function knowledge(Request $request)
    {
        return view('customer.home.knowledge');
    }

    public function detail_project($lug)
    {
        $project = $this->realEstateProjectService->detail_project($lug);
        return view('customer.home.detail-project', compact('project'));
    }
}
