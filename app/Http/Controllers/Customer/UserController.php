<?php


namespace App\Http\Controllers\Customer;


use App\Http\Controllers\BaseController;
use App\Http\Controllers\Requests\FormRegister;
use App\Http\Services\BillsService;
use App\Http\Services\ContractService;
use App\Http\Services\UserService;
use App\Models\Contract;
use Illuminate\Http\Request;
use App\Http\Services\BankService;
use App\Http\Services\CityService;
use App\Http\Services\DistrictService;
use App\Http\Services\WardService;
use App\Http\Services\UploadService;
use App\Http\Requests\FormUpdateProfile;
use App\Http\Requests\FormAuth;
use Toastr;
use App\Http\Requests\FormQuestion;
use App\Http\Services\QuestionService;
use Illuminate\Support\Facades\Session;

class UserController extends BaseController
{
    protected $userService;
    protected $bankService;
    protected $cityService;
    protected $districtService;
    protected $wardService;
    protected $uploadService;
    protected $billsService;
    protected $contractService;
    protected $questionService;

    public function __construct(
        UserService $userService,
        BankService $bankService,
        CityService $cityService,
        DistrictService $districtService,
        WardService $wardService,
        UploadService $uploadService,
        BillsService $billsService,
        ContractService $contractService,
        QuestionService $questionService
    )
    {
        $this->userService = $userService;
        $this->bankService = $bankService;
        $this->cityService = $cityService;
        $this->districtService = $districtService;
        $this->wardService = $wardService;
        $this->uploadService = $uploadService;
        $this->billsService = $billsService;
        $this->contractService = $contractService;
        $this->questionService = $questionService;
    }

    public function find(Request $request)
    {
        $user = $this->userService->find($request->id);
        return BaseController::send_response(BaseController::HTTP_OK, __('message.success'), $user);
    }

    public function customer_login_social(Request $request)
    {
        $message = $this->userService->validate_login_social($request);
        if (count($message) > 0) {
            return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, $message[0]);
        } else {
            $data = $this->userService->login_social($request);
            return BaseController::send_response(BaseController::HTTP_OK, __('message.success'), $data);
        }
    }

    public function manager(Request $request)
    {
        $main_tab = !empty($request->main_tab) ? $request->main_tab : 'manager';
        $tab = !empty($request->tab) ? $request->tab : 'active';
        $action = !empty($request->action) ? $request->action : 'show';
        if ($main_tab == 'manager') {
            if ($tab == 'active') {
                $report = $this->contractService->report_contract_by_user($request, Contract::EFFECT);
                $contracts = $this->contractService->get_contract_by_user($request, Contract::EFFECT);
                return view('customer.user.manager', compact('contracts', 'report'));
            } elseif ($tab == 'complete') {
                $report = $this->contractService->report_contract_by_user($request, Contract::EXPIRE);
                $contracts = $this->contractService->get_contract_by_user($request, Contract::EXPIRE);
                return view('customer.user.manager-complete', compact('contracts', 'report'));
            } elseif ($tab == 'warning') {
                $report = $this->billsService->report_bill_by_user($request);
                $bills = $this->billsService->get_bill_warning($request);
                return view('customer.user.manager-warning', compact('bills', 'report'));
            }
        } elseif ($main_tab == 'history') {
            $contracts = $this->contractService->get_contract_by_user($request, '');
            return view('customer.user.history-investor', compact('contracts'));
        } elseif ($main_tab == 'profile') {
            if ($action == 'update') {
                $user = session()->get('customer');
                $detail = $this->userService->find($user['id']);
                $allBankName = $this->bankService->getAllBank();
                $province = $this->cityService->get_province();
                $district = $this->districtService->get_district();
                $ward = $this->wardService->get_ward();
                return view('customer.user.profile', [
                    'detail' => $detail,
                    'banks' => $allBankName,
                    'province' => $province,
                    'district' => $district,
                    'ward' => $ward,
                ]);
            } else {
                $user = session()->get('customer');
                $detail = $this->userService->find($user['id']);
                $allBankName = $this->bankService->getAllBank();
                $province = $this->cityService->get_province();
                $district = $this->districtService->get_district();
                $ward = $this->wardService->get_ward();
                return view('customer.user.info', [
                    'detail' => $detail,
                    'banks' => $allBankName,
                    'province' => $province,
                    'district' => $district,
                    'ward' => $ward,
                ]);
            }
        }
        return view('customer.user.manager');
    }

    public function update_profile(FormUpdateProfile $request)
    {
        $user = session()->get('customer');
        $userId = $user['id'];
        $update_profile = $this->userService->update_profile($request, $userId);
        if ($update_profile) {
            Session::put('customer', $update_profile);
            toastr()->success('C???p nh???t th??nh c??ng', __('message.success'));
            return redirect("/customer/user/manager?main_tab=profile");
        }
        toastr()->error('C???p nh???t th???t b???i', __('message.fail'));
        return redirect("/customer/user/manager?main_tab=profile");
    }

    public function get_district_by_province(Request $request)
    {
        $district = $this->districtService->get_district_by_province($request->code);
        if ($district) {
            return BaseController::send_response(BaseController::HTTP_OK, __('message.success'), $district);
        }
        return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, __('message.fail'), []);
    }

    public function get_ward_by_district(Request $request)
    {
        $ward = $this->wardService->get_ward_by_district($request->code);
        if ($ward) {
            return BaseController::send_response(BaseController::HTTP_OK, __('message.success'), $ward);
        }
        return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, __('message.fail'), []);
    }

    public function auth(FormAuth $request)
    {
        $user = session()->get('customer');
        $userId = $user['id'];
        $auth = $this->userService->auth($request, $userId);
        if ($auth) {
            Session::put('customer', $auth);
            toastr()->success(__("message.send_auth_success"), __('message.success'));
            return redirect("/customer/user/manager?main_tab=profile");
        }
        toastr()->error(__("message.send_auth_fail"), __('message.fail'));
        return redirect("/customer/user/manager?main_tab=profile");
    }

    public function question(FormQuestion $request)
    {
        $create = $this->questionService->create($request);
        if ($create) {
            return BaseController::send_response(BaseController::HTTP_OK, __('message.success'), $create);
        }
        return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, __('message.fail'), []);
    }
}
