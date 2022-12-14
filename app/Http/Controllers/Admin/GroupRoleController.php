<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BaseController;
use App\Http\Services\GroupRoleService;
use Illuminate\Http\Request;

class GroupRoleController extends BaseController
{
    protected $groupRoleService;

    public function __construct(GroupRoleService $groupRoleService)
    {
        $this->groupRoleService = $groupRoleService;
    }

    public function index()
    {
        $groups = $this->groupRoleService->get_all();
        return view('employee.group.list', compact('groups'));
    }

    public function create()
    {
        return view('employee.group.create');
    }

    public function store(Request $request)
    {
        $validate = $this->groupRoleService->validate_store($request);
        if ($validate->fails()) {
            return BaseController::send_response(self::HTTP_BAD_REQUEST, $validate->errors()->first());
        } else {
            $this->groupRoleService->store($request);
            return BaseController::send_response(self::HTTP_OK, __('message.success'));
        }
    }

    public function detail($id)
    {
        $group = $this->groupRoleService->find($id);
        return view('employee.group.update', compact('group'));
    }

    public function update(Request $request)
    {
        $group = $this->groupRoleService->find($request->id);
        if (!$group) {
            return BaseController::send_response(self::HTTP_BAD_REQUEST, __('message.fail'));
        } else {
            $this->groupRoleService->update($request);
            return BaseController::send_response(self::HTTP_OK, __('message.success'));
        }
    }
}
