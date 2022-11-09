<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BaseController;
use App\Http\Requests\FormLogin;
use Illuminate\Http\Request;
use App\Http\Services\UserService;
use App\Models\Users;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\FormCreateEmployee;

class UserController extends BaseController
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function find(Request $request)
    {
        $user = $this->userService->find($request->id);
        return BaseController::send_response(BaseController::HTTP_OK, __('message.success'), $user);
    }

    public function create_employee(FormCreateEmployee $request)
    {
        $user = $this->userService->create_employee($request);
        if ($user) {
            toastr()->success(__("message.create_success"), __('message.success'));
            return redirect()->route('customer.employee.get_all');
        }
        toastr()->error(__("message.create_fail"), __('message.fail'));
        return redirect()->route('customer.employee.get_all');
    }

    public function create_admin(Request $request)
    {
        $user = $this->userService->create_admin($request);
        return BaseController::send_response(BaseController::HTTP_OK, __('message.success'), $user);
    }

    public function employee_login(FormLogin $request)
    {
        $data = $this->userService->check_login($request, Users::EMPLOYEE);
        if (!empty($data['message'])) {
            $error = $data['message'];
        } else {
            $user = $this->userService->login($data['user']);
            if ($user) {
                Session::put('employee', $user);
                return redirect()->route('dashboard');
            } else {
                $error = __('auth.login_fail');
            }
        }
        return view('employee.auth.login', compact('error'));
    }

    public function login(Request $request)
    {
        return view('employee.auth.login');
    }

    public function logout()
    {
        Session::forget('employee');
        return redirect()->route('admin');

    }

    public function get_all_employee() {
        $employees = $this->userService->get_all_employee();
        return view('employee.manager.index', [
            'employees' => $employees,
        ]);
    }

    public function store_employee() {
        return view('employee.manager.createEmployee');
    }

    public function edit_employee($id) {
        $user = $this->userService->find($id);
        return view('employee.manager.updateEmployee', [
            'user' => $user,
        ]);
    }

    public function update_employee(FormCreateEmployee $request, $id) {
        $user = $this->userService->update_employee($request, $id);
        if ($user) {
            toastr()->success(__("message.update_success"), __('message.success'));
            return redirect()->route('customer.employee.edit_employee',['id' => $id]);
        }
        toastr()->error(__("message.update_fail"), __('message.fail'));
        return redirect()->route('customer.employee.edit_employee',['id' => $id]);
    }

    public function detail_employee($id) {
        $user = $this->userService->find($id);
        return view('employee.manager.detailEmployee', [
            'user' => $user,
        ]);
    }

    public function update_status(Request $request) {
        $id = $request->input("id");
        $status = $this->userService->update_status($id);
        if ($status) {
            return BaseController::send_response(BaseController::HTTP_OK, __('message.success'), $status);
        }
        return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, __('message.fail'), []);
    }

    public function get_all_customer() {
        $customer = $this->userService->get_all_customer();
        return view('employee.manager_user.index', [
            'customer' => $customer,
        ]);
    }

    public function detail_customer($id) {
        $customer = $this->userService->find($id);
        return view('employee.manager_user.detailUser', [
            'customer' => $customer,
        ]);
    }

    public function edit_customer($id) {
        $customer = $this->userService->find($id);
        return view('employee.manager_user.updateUser', [
            'customer' => $customer,
        ]);
    }

    // public function update_customer(FormCreateEmployee $request, $id) {
    //     $customer = $this->userService->update_customer($request, $id);
    //     if ($customer) {
    //         toastr()->success(__("message.update_success"), __('message.success'));
    //         return redirect()->route('customer.customer.edit_customer',['id' => $id]);
    //     }
    //     toastr()->error(__("message.update_fail"), __('message.fail'));
    //     return redirect()->route('customer.customer.edit_customer',['id' => $id]);
    // }

    public function auth(Request $request, $id) {
        $auth =  $this->userService->confirm_auth($id);
        if ($auth) {
            return BaseController::send_response(BaseController::HTTP_OK, __('message.success'), $auth);
        }
        return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, __('message.fail'));
    }

    public function not_auth(Request $request, $id) {
        $auth =  $this->userService->not_confirm_auth($id);
        if ($auth) {
            return BaseController::send_response(BaseController::HTTP_OK, __('message.success'), $auth);
        }
        return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, __('message.fail'));
    }
}
