<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\FeedBackService;
use App\Models\FeedBack;
use Yoeunes\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\FormCreateFeedBack;
use App\Http\Requests\FormUpdateFeedBack;

class FeedbackController extends BaseController
{
    //
    protected $feedBackService;


    public function __construct(FeedBackService $feedBackService)
    {
        $this->feedBackService = $feedBackService;
    }

    public function index()
    {
        $list = $this->feedBackService->get_all();
        return view('employee.feedback.index', [
            'list' => $list,
        ]);
    }

    public function create()
    {
        return view('employee.feedback.create');
    }

    public function save(FormCreateFeedBack $request)
    {
        $create = $this->feedBackService->create($request);
        if ($create) {
            toastr()->success(__("message.create_success"), __('message.success'));
            return redirect()->route('feedback.create');
        }
        toastr()->error(__("message.create_fail"), __('message.fail'));
        return redirect()->route('feedback.create');
    }

    public function edit($id) 
    {
        $detail = $this->feedBackService->find($id);
        return view('employee.feedback.update', [
            'detail' => $detail,
        ]);
    }

    public function update(FormUpdateFeedBack $request, $id) 
    {
        $update = $this->feedBackService->update($request, $id);
        if ($update) {
            toastr()->success(__("message.create_success"), __('message.success'));
            return redirect()->route('feedback.edit',['id' => $id]);
        }
        toastr()->error(__("message.create_fail"), __('message.fail'));
        return redirect()->route('feedback.edit', ['id' => $id]);
    }

    public function detail($id) 
    {
        $detail = $this->feedBackService->find($id);
        return view('employee.feedback.detail', [
            'detail' => $detail,
        ]);
    }

    public function update_status(Request $request)
    {
        $id = $request->input("id");
        $status = $this->feedBackService->update_status($id);
        if ($status) {
            return BaseController::send_response(BaseController::HTTP_OK, __('message.success'), $status);
        }
        return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, __('message.fail'), []);
    }
}
