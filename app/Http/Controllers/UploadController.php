<?php


namespace App\Http\Controllers;


use App\Http\Services\UploadService;
use Illuminate\Http\Request;

class UploadController extends BaseController
{
    protected $uploadService;

    public function __construct(UploadService $uploadService)
    {
        $this->uploadService = $uploadService;
    }

    public function upload(Request $request)
    {
        $data = $this->uploadService->upload($request);
        return BaseController::send_response(BaseController::HTTP_OK, __('message.success'), $data);
    }
}
