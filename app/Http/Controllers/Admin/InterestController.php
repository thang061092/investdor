<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BaseController;
use App\Http\Services\InterestService;
use Illuminate\Http\Request;

class InterestController extends BaseController
{
    protected $interestService;

    public function __construct(InterestService $interestService)
    {
        $this->interestService = $interestService;
    }

    public function create(Request $request)
    {
        $message = $this->interestService->validate_create($request);
        if (count($message) > 0) {
            return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, $message[0]);
        } else {
            $this->interestService->create($request);
            return BaseController::send_response(BaseController::HTTP_OK, __('message.success'));
        }
    }
}
