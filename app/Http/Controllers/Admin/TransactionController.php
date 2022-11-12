<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BaseController;
use App\Http\Services\BillsService;
use App\Http\Services\CityService;
use App\Http\Services\RealEstateProjectService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends BaseController
{
    protected $cityService;
    protected $realEstateProjectService;
    protected $billsService;

    public function __construct(CityService $cityService,
                                RealEstateProjectService $realEstateProjectService,
                                BillsService $billsService)
    {
        $this->cityService = $cityService;
        $this->realEstateProjectService = $realEstateProjectService;
        $this->billsService = $billsService;
    }

    public function wait_pay(Request $request)
    {
        $bills = $this->billsService->wait_pay($request);
        return view('employee.transaction.wait_pay', compact('bills'));
    }

    public function get_bill($id)
    {
        $bill = $this->billsService->find($id);
        if ($bill) {
            $bill->user = $bill->user()->select('full_name')->first();
            $bill->project = $bill->realEstateProject()->select('name_vi', 'name_en')->first();
            $bill->amount_money = number_format_vn($bill->amount_money);
            $bill->time_create = Carbon::parse($bill->created_at)->format('d/m/Y H:i:s');
            return BaseController::send_response(BaseController::HTTP_OK, __('message.success'), $bill);
        } else {
            return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, __('message.fail'));
        }
    }

    public function update_bill(Request $request)
    {
        $message = $this->billsService->validate_update_bill($request);
        if (count($message) > 0) {
            return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, $message[0]);
        } else {
            try {
                $bill = $this->billsService->update_bill($request);
                return BaseController::send_response(BaseController::HTTP_OK, __('message.success'), $bill);
            } catch (\Exception $exception) {
                return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, $exception->getMessage());
            }
        }

    }
}
