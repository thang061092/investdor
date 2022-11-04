<?php


namespace App\Http\Controllers\Customer;


use App\Http\Controllers\BaseController;
use App\Http\Controllers\Requests\FormRegister;
use App\Http\Services\UserService;
use App\Http\Services\BankService;
use App\Http\Services\CityService;
use App\Http\Services\DistrictService;
use App\Http\Services\WardService;
use Illuminate\Http\Request;
use App\Http\Requests\FormLogin;
use App\Http\Requests\FormUpdateProfile;
use Toastr;
use Illuminate\Support\Facades\Storage;

class UserController extends BaseController
{
    protected $userService;
    protected $bankService;
    protected $cityService;
    protected $districtService;
    protected $wardService;

    public function __construct(
        UserService $userService, 
        BankService $bankService, CityService $cityService, 
        DistrictService $districtService,
        WardService $wardService
    )
    {
        $this->userService = $userService;
        $this->bankService = $bankService;
        $this->cityService = $cityService;
        $this->districtService = $districtService;
        $this->wardService = $wardService;
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
        if ($main_tab == 'manager') {
            if ($tab == 'active') {
                return view('customer.user.manager');
            } elseif ($tab == 'complete') {
                return view('customer.user.manager-complete');
            } elseif ($tab == 'warning') {
                return view('customer.user.manager-warning');
            }
        } elseif ($main_tab == 'history') {
            return view('customer.user.history-investor');
        } elseif ($main_tab == 'profile') {
            $user = session()->get('customer');
            $allBankName = $this->bankService->getAllBank();
            $province = $this->cityService->get_province();
            $district = $this->districtService->get_district();
            $ward = $this->wardService->get_ward();
            return view('customer.user.profile', [
                'detail' => $user,
                'banks' => $allBankName,
                'province' => $province,
                'district' => $district,
                'ward' => $ward,
            ]);
        }
        return view('customer.user.manager');
    }

    public function update_profile(FormUpdateProfile $request) {
        $user = session()->get('customer');
        $userId = $user['id'];
        $update_profile = $this->userService->update_profile($request, $userId);
        if ($update_profile) {
            Toastr::success('Cập nhật thành công :)',__('message.success'));
            return redirect("/customer/user/manager?main_tab=profile");
        }
        Toastr::error('Cập nhật thất bại :)',__('message.fail'));
        return redirect("/customer/user/manager?main_tab=profile");
    }

    public function get_district_by_province(Request $request) {
        $district = $this->districtService->get_district_by_province($request->code);
        if ($district) {
            return BaseController::send_response(BaseController::HTTP_OK, __('message.success'), $district);
        }
        return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, __('message.fail'), []);
    }

    public function get_ward_by_district(Request $request) {
        $ward = $this->wardService->get_ward_by_district($request->code);
        if ($ward) {
            return BaseController::send_response(BaseController::HTTP_OK, __('message.success'), $ward);
        }
        return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, __('message.fail'), []);
    }
}
