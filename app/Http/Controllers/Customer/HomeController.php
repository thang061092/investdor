<?php


namespace App\Http\Controllers\Customer;


use App\Http\Controllers\BaseController;
use App\Http\Services\CityService;
use App\Http\Services\ConfigService;
use App\Http\Services\InterestService;
use App\Http\Services\RealEstateProjectService;
use App\Models\DetailInterest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Services\NewsService;
use App\Http\Services\CategoryNewsService;
use Yoeunes\Toastr\Facades\Toastr;
use App\Http\Services\FeedBackService;

class HomeController extends BaseController
{
    protected $cityService;
    protected $realEstateProjectService;
    protected $interestService;
    protected $newsService;
    protected $categoryService;
    protected $configService;
    protected $feedbackService;

    public function __construct(CityService $cityService,
                                RealEstateProjectService $realEstateProjectService,
                                InterestService $interestService,
                                NewsService $newsService,
                                CategoryNewsService $categoryService,
                                ConfigService $configService,
                                FeedBackService $feedbackService)
    {
        $this->cityService = $cityService;
        $this->realEstateProjectService = $realEstateProjectService;
        $this->interestService = $interestService;
        $this->newsService = $newsService;
        $this->categoryService = $categoryService;
        $this->configService = $configService; 
        $this->feedbackService = $feedbackService; 
    }

    public function index(Request $request)
    {
        $projects = $this->realEstateProjectService->list_project_index($request);
        $feedback = $this->feedbackService->get_all();
        return view('customer.home.index', compact('projects','feedback'));
    }

    public function home_page(Request $request)
    {
        $projects = $this->realEstateProjectService->list_project_investor($request);
        return view('customer.home.home-page', compact('projects'));
    }

    public function knowledge(Request $request)
    {
        $categories = $this->categoryService->get_all();
        return view('customer.home.knowledge', [
            'categories' => $categories,
        ]);
    }

    public function detail_project($lug)
    {
        $project = $this->realEstateProjectService->detail_project($lug);
        $config_view = $this->configService->find_config_view();
        $config_index = $this->configService->find_config('index');
        return view('customer.home.detail-project', compact('project', 'config_view', 'config_index'));
    }

    public function detail_knowledge(Request $request)
    {
        $knowledge = $this->newsService->detail_knowledge($request);
        return view('customer.home.detail-know', compact('knowledge'));
    }
}
