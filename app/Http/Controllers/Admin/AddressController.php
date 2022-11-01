<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BaseController;
use App\Http\Services\CityService;
use App\Http\Services\DistrictService;
use App\Http\Services\WardService;
use Illuminate\Http\Request;

class AddressController extends BaseController
{
    public $cityService;
    public $districtService;
    public $wardService;

    public function __construct(CityService $cityService,
                                DistrictService $districtService,
                                WardService $wardService)
    {
        $this->cityService = $cityService;
        $this->districtService = $districtService;
        $this->wardService = $wardService;
    }

    public function district(Request $request)
    {
        $data = $this->districtService->district($request);
        return BaseController::send_response(self::HTTP_OK, __('message.success'), $data);
    }

    public function ward(Request $request)
    {
        $data = $this->wardService->ward($request);
        return BaseController::send_response(self::HTTP_OK, __('message.success'), $data);
    }
}
