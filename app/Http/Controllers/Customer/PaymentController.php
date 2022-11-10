<?php


namespace App\Http\Controllers\Customer;


use App\Http\Controllers\BaseController;
use App\Http\Services\CityService;
use App\Http\Services\RealEstateProjectService;
use App\Http\Services\VietQr;
use Illuminate\Http\Request;

class PaymentController extends BaseController
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

    public function link(Request $request)
    {
        $link = $this->vietQr->get_link($request->amount, $request->description);
        return BaseController::send_response(self::HTTP_OK, __('message.success'), $link);
    }
}
