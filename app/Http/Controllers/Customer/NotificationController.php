<?php


namespace App\Http\Controllers\Customer;


use App\Http\Controllers\BaseController;
use App\Http\Services\NotificationService;
use Illuminate\Http\Request;

class NotificationController extends BaseController
{
    protected $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function get_by_user(Request $request)
    {
        $notifications = $this->notificationService->get_by_user();
        return view('customer.notification.list', compact('notifications'));
    }
}
