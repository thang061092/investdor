<?php


namespace App\Http\Controllers\Customer;


use App\Http\Controllers\BaseController;
use App\Http\Services\Authorization;
use App\Http\Services\BankService;
use App\Http\Services\BillsService;
use App\Http\Services\CityService;
use App\Http\Services\RealEstateProjectService;
use App\Http\Services\VietQr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yoeunes\Toastr\Facades\Toastr;

class InvestmentController extends BaseController
{
    protected $cityService;
    protected $realEstateProjectService;
    protected $vietQr;
    protected $billsService;
    protected $bankService;

    public function __construct(CityService $cityService,
                                RealEstateProjectService $realEstateProjectService,
                                VietQr $vietQr,
                                BillsService $billsService,
                                BankService $bankService)
    {
        $this->cityService = $cityService;
        $this->realEstateProjectService = $realEstateProjectService;
        $this->vietQr = $vietQr;
        $this->billsService = $billsService;
        $this->bankService = $bankService;
    }

    public function step1($slug)
    {
        $project = $this->realEstateProjectService->detail_project($slug);
        $banks = $this->bankService->getAllBank();
        return view('customer.investment.step1', compact('project', 'banks'));
    }

    public function step1_submit(Request $request)
    {
        $message = $this->realEstateProjectService->validate_step1($request);
        if (count($message) > 0) {
            return BaseController::send_response(self::HTTP_BAD_REQUEST, $message[0]);
        } else {
            $project = $this->realEstateProjectService->find($request->project_id);
            $bill = $this->billsService->create_step1($request, $project);
            $data = [
                'project_id' => $project['id'],
                'project_name' => $project['slug_vi'],
                'bill_id' => $bill['id'],
                'checksum' => $bill['checksum']
            ];
            return BaseController::send_response(self::HTTP_OK, __('message.success'), $data);
        }
    }

    public function step2(Request $request, $slug)
    {
        $project = $this->realEstateProjectService->detail_project($slug);
        $checksum = $request->checksum;
        return view('customer.investment.step2', compact('project', 'checksum'));
    }

    public function step2_submit(Request $request)
    {
        $message = $this->realEstateProjectService->validate_step2($request);
        if (count($message) > 0) {
            return BaseController::send_response(self::HTTP_BAD_REQUEST, $message[0]);
        } else {
            $checksum = Authorization::validateToken($request->checksum);
            $project = $this->realEstateProjectService->find($checksum->project_id);
            $amount = (int)$request->part_investment * (int)$project['value_part'];
            $bill = $this->billsService->create_step2($request, $project, $checksum->bill_id, $amount);
            $data = [
                'project_id' => $project['id'],
                'project_name' => $project['slug_vi'],
                'bill_id' => $bill['id'],
                'checksum' => $bill['checksum']
            ];
            return BaseController::send_response(self::HTTP_OK, __('message.success'), $data);
        }
    }

    public function step3(Request $request, $slug)
    {
        $project = $this->realEstateProjectService->detail_project($slug);
        $checksum_new = $request->checksum;
        return view('customer.investment.step3', compact('project', 'checksum_new'));
    }

    public function step3_submit(Request $request)
    {
        $message = $this->realEstateProjectService->validate_step3($request);
        if (count($message) > 0) {
            return BaseController::send_response(self::HTTP_BAD_REQUEST, $message[0]);
        } else {
            $checksum = Authorization::validateToken($request->checksum);
            $project = $this->realEstateProjectService->find($checksum->project_id);
            $bill = $this->billsService->create_step3($checksum->bill_id);
            $data = [
                'project_id' => $project['id'],
                'project_name' => $project['slug_vi'],
                'bill_id' => $bill['id'],
                'checksum' => $bill['checksum']
            ];
            return BaseController::send_response(self::HTTP_OK, __('message.success'), $data);
        }
    }

    public function step4(Request $request, $slug)
    {
        $checksum = Authorization::validateToken($request->checksum);
        $bill = $this->billsService->find($checksum->bill_id);
        if ($bill['user_id'] != Session::get('customer')['id']) {
            Toastr::error(__('validate.request_illegal'));
            return redirect()->route('customer.home_page');
        }
        return view('customer.investment.step4', compact('bill'));
    }
}
