<?php


namespace App\Http\Controllers\Customer;


use App\Http\Controllers\BaseController;
use App\Http\Services\CityService;
use App\Http\Services\RealEstateProjectService;
use Illuminate\Http\Request;

class ProjectController extends BaseController
{
    protected $cityService;
    protected $realEstateProjectService;

    public function __construct(CityService $cityService,
                                RealEstateProjectService $realEstateProjectService)
    {
        $this->cityService = $cityService;
        $this->realEstateProjectService = $realEstateProjectService;
    }
}
