<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BaseController;
use App\Http\Requests\FormLogin;
use Illuminate\Http\Request;
use App\Http\Services\UserService;
use App\Http\Services\NewsService;
use App\Http\Services\CategoryNewsService;
use App\Http\Services\QuestionService;
use App\Models\Users;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\FormCreateEmployee;
use App\Http\Requests\FormCreateNews;
use App\Http\Requests\FormCategory;
use App\Http\Requests\FormUpdateEmployee;
use App\Http\Services\BankService;
use App\Http\Requests\FormAnswer;

class UserController extends BaseController
{
    protected $userService;
    protected $newsService;
    protected $categoryService;
    protected $bankService;
    protected $questionService;

    public function __construct(UserService $userService, NewsService $newsService, CategoryNewsService $categoryService, BankService $bankService, QuestionService $questionService)
    {
        $this->userService = $userService;
        $this->newsService = $newsService;
        $this->categoryService = $categoryService;
        $this->bankService = $bankService;
        $this->questionService = $questionService;
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

    public function get_all_employee()
    {
        $employees = $this->userService->get_all_employee();
        return view('employee.manager.index', [
            'employees' => $employees,
        ]);
    }

    public function store_employee()
    {
        return view('employee.manager.createEmployee');
    }

    public function edit_employee($id)
    {
        $allBankName = $this->bankService->getAllBank();
        $user = $this->userService->find($id);
        return view('employee.manager.updateEmployee', [
            'user' => $user,
            'banks' => $allBankName,
        ]);
    }

    public function update_employee(FormUpdateEmployee $request, $id)
    {
        $user = $this->userService->update_employee($request, $id);
        if ($user) {
            Session::put('employee', $user);
            toastr()->success(__("message.update_success"), __('message.success'));
            return redirect()->route('customer.employee.edit_employee', ['id' => $id]);
        }
        toastr()->error(__("message.update_fail"), __('message.fail'));
        return redirect()->route('customer.employee.edit_employee', ['id' => $id]);
    }

    public function detail_employee($id)
    {
        $user = $this->userService->find($id);
        $allBankName = $this->bankService->getAllBank();
        return view('employee.manager.detailEmployee', [
            'user' => $user,
            'banks' => $allBankName,
        ]);
    }

    public function update_status(Request $request)
    {
        $id = $request->input("id");
        $status = $this->userService->update_status($id);
        if ($status) {
            return BaseController::send_response(BaseController::HTTP_OK, __('message.success'), $status);
        }
        return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, __('message.fail'), []);
    }

    public function get_all_customer()
    {
        $customer = $this->userService->get_all_customer();
        return view('employee.manager_user.index', [
            'customer' => $customer,
        ]);
    }

    public function detail_customer($id)
    {
        $customer = $this->userService->find($id);
        return view('employee.manager_user.detailUser', [
            'customer' => $customer,
        ]);
    }

    public function edit_customer($id)
    {
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

    public function auth(Request $request, $id)
    {
        $auth = $this->userService->confirm_auth($id);
        if ($auth) {
            return BaseController::send_response(BaseController::HTTP_OK, __('message.success'), $auth);
        }
        return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, __('message.fail'));
    }

    public function not_auth(Request $request, $id)
    {
        $auth = $this->userService->not_confirm_auth($id);
        if ($auth) {
            return BaseController::send_response(BaseController::HTTP_OK, __('message.success'), $auth);
        }
        return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, __('message.fail'));
    }

    public function list_news()
    {
        $list = $this->newsService->get_all();
        return view('employee.news.index', [
            'list' => $list,
        ]);
    }

    public function create_news()
    {
        $categories = $this->categoryService->get_all();
        return view('employee.news.createNews', [
            'categories' => $categories,
        ]);
    }

    public function save_news(FormCreateNews $request)
    {
        $create = $this->newsService->create($request);
        if ($create) {
            toastr()->success(__("message.create_success"), __('message.success'));
            return redirect()->route('customer.employee.create_news');
        }
        toastr()->error(__("message.create_fail"), __('message.fail'));
        return redirect()->route('customer.employee.create_news');
    }

    public function update_status_news(Request $request)
    {
        $id = $request->input("id");
        $status = $this->newsService->update_status($id);
        if ($status) {
            return BaseController::send_response(BaseController::HTTP_OK, __('message.success'), $status);
        }
        return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, __('message.fail'), []);
    }

    public function edit_news($id)
    {
        $detail = $this->newsService->find($id);
        $categories = $this->categoryService->get_all();
        return view('employee.news.updateNews', [
            'detail' => $detail,
            'categories' => $categories,
        ]);
    }

    public function update_news(FormCreateNews $request, $id)
    {
        $news = $this->newsService->update_news($request, $id);
        if ($news) {
            toastr()->success(__("message.update_success"), __('message.success'));
            return redirect()->route('customer.employee.edit_news', ['id' => $id]);
        }
        toastr()->error(__("message.update_fail"), __('message.fail'));
        return redirect()->route('customer.employee.edit_news', ['id' => $id]);
    }

    public function detail_news($id)
    {
        $detail = $this->newsService->find($id);
        return view('employee.news.detailNews', [
            'detail' => $detail,
        ]);
    }

    public function list_category()
    {
        $list = $this->categoryService->get_all();
        return view('employee.category_news.index', [
            'list' => $list,
        ]);
    }

    public function create_category()
    {
        return view('employee.category_news.create');
    }

    public function save_category(FormCategory $request)
    {
        $create = $this->categoryService->create($request);
        if ($create) {
            toastr()->success(__("message.create_success"), __('message.success'));
            return redirect()->route('customer.employee.create_category');
        }
        toastr()->error(__("message.create_fail"), __('message.fail'));
        return redirect()->route('customer.employee.create_category');
    }

    public function edit_category($id)
    {
        $detail = $this->categoryService->find($id);
        return view('employee.category_news.update', [
            'detail' => $detail,
        ]);
    }

    public function update_category(FormCategory $request, $id)
    {
        $update = $this->categoryService->update($request, $id);
        if ($update) {
            toastr()->success(__("message.update_success"), __('message.success'));
            return redirect()->route('customer.employee.edit_category', ['id' => $id]);
        }
        toastr()->error(__("message.update_fail"), __('message.fail'));
        return redirect()->route('customer.employee.edit_category', ['id' => $id]);
    }

    public function update_status_category(Request $request)
    {
        $id = $request->input("id");
        $status = $this->categoryService->update_status($id);
        if ($status) {
            return BaseController::send_response(BaseController::HTTP_OK, __('message.success'), $status);
        }
        return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, __('message.fail'), []);
    }

    public function detail_category($id)
    {
        $detail = $this->categoryService->find($id);
        return view('employee.category_news.detail', [
            'detail' => $detail,
        ]);
    }

    public function list_question()
    {
        $questions = $this->questionService->get_all();
        if ($questions) {
            return view('employee.question.index', [
                'questions' => $questions,
            ]);
        }
    }

    public function detail_question($id)
    {
        $detail = $this->questionService->find($id);
        return view('employee.question.detail', [
            'detail' => $detail,
        ]);
    }

    public function get_user_add_role(Request $request)
    {
        $users = $this->userService->get_user_add_role($request);
        return BaseController::send_response(self::HTTP_OK, __('message.success'), $users);
    }

    public function role_employee(Request $request, $id)
    {
        $user = $this->userService->find($id);
        return view('employee.role.role_user', compact('user'));
    }

    public function update_role_employee(Request $request)
    {
        $this->userService->update_role_employee($request);
        return BaseController::send_response(self::HTTP_OK, __('message.success'));
    }

    public function send_answer(FormAnswer $request, $id) {
        $answer = $this->questionService->send_answer($request, $id);
        if ($answer) {
            toastr()->success(__("message.answer_success"), __('message.success'));
            return redirect()->route('detail_question', ['id' => $id]);
        }
        toastr()->error(__("message.answer_fail"), __('message.fail'));
        return redirect()->route('detail_question', ['id' => $id]);
    }

    public function change_password(Request $request, $id) {
        $pass = $this->userService->change_password_employee($request, $id);
        if ($pass) {
            return BaseController::send_response(BaseController::HTTP_OK, __('message.success'), $pass);
        }
        return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, __('message.fail'), []);
    }
}
