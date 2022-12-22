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

    public function create(Request $request)
    {
        $this->configService->create($request);
        return BaseController::send_response(self::HTTP_OK, __('message.success'));
    }

    public function create_index(Request $request)
    {
        $this->configService->create_index($request);
        return BaseController::send_response(self::HTTP_OK, __('message.success'));
    }

    public function update_config_project(Request $request)
    {
        $this->configService->update_config_project($request);
        return BaseController::send_response(self::HTTP_OK, __('message.success'));
    }

    public function config_project()
    {
        $config_view = $this->configService->find_config('view');
        $config_index = $this->configService->find_config('index');
        return view('employee.config.project', compact('config_view', 'config_index'));
    }

    public function swap_config_index(Request $request)
    {
        $this->configService->swap_config_index($request);
        return BaseController::send_response(self::HTTP_OK, __('message.success'));
    }

    public function config_index()
    {
        $config_index = $this->configService->find_config('index');
        return BaseController::send_response(self::HTTP_OK, __('message.success'), $config_index);
    }

}
