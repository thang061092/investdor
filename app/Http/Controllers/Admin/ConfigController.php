<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BaseController;
use App\Http\Services\ConfigService;
use Illuminate\Http\Request;

class ConfigController extends BaseController
{
    protected $configService;

    public function __construct(ConfigService $configService)
    {
        $this->configService = $configService;
    }

    public function create()
    {
        $this->configService->create();
        return BaseController::send_response(self::HTTP_OK, __('message.success'));
    }

    public function update_config_project(Request $request, $id)
    {
        $this->configService->update_config_project($request, $id);
        return BaseController::send_response(self::HTTP_OK, __('message.success'));
    }

    public function config_project()
    {
        $config = $this->configService->find_config_project();
        return view('employee.config.project', compact('config'));
    }

}
