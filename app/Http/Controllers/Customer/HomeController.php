<?php


namespace App\Http\Controllers\Customer;


use App\Http\Controllers\BaseController;
use App\Http\Services\CityService;
use App\Http\Services\InterestService;
use App\Http\Services\RealEstateProjectService;
use App\Models\DetailInterest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Services\NewsService;
use App\Http\Services\CategoryNewsService;

class HomeController extends BaseController
{
    protected $cityService;
    protected $realEstateProjectService;
    protected $interestService;
    protected $newsService;
    protected $categoryService;

    public function __construct(CityService $cityService,
                                RealEstateProjectService $realEstateProjectService,
                                InterestService $interestService,
                                NewsService $newsService, 
                                CategoryNewsService $categoryService)
    {
        $this->cityService = $cityService;
        $this->realEstateProjectService = $realEstateProjectService;
        $this->interestService = $interestService;
        $this->newsService = $newsService;
        $this->categoryService = $categoryService;
    }

    public function index(Request $request)
    {
        $interest = $this->interestService->get_current_interest();
        $current_interest = $interest['detail']['interest'] ?? 12;
        $projects = $this->realEstateProjectService->list_project_investor($request);
        return view('customer.home.index', compact('projects', 'current_interest'));
    }

    public function home_page(Request $request)
    {
        $interest = $this->interestService->get_current_interest();
        $current_interest = $interest['detail']['interest'] ?? 12;
        $projects = $this->realEstateProjectService->list_project_investor($request);
        return view('customer.home.home-page', compact('projects', 'current_interest'));
    }

    public function knowledge(Request $request)
    {
        $news = $this->newsService->get_all();
        $category = $this->categoryService->get_all();
        return view('customer.home.knowledge',[
            'news' => $news,
            'category' => $category,
        ]);
    }

    public function detail_project($lug)
    {
        $interest = $this->interestService->get_current_interest();
        $current_interest = $interest['detail']['interest'] ?? 12;
        $project = $this->realEstateProjectService->detail_project($lug);
        return view('customer.home.detail-project', compact('project', 'current_interest'));
    }
}
