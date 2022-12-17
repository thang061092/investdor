<?php


namespace App\Http\Services;


use App\Http\Repositories\NotificationRepository;
use App\Models\Notification;

class NotificationService
{
    protected $notificationRepository;

    public function __construct(NotificationRepository $notificationRepository)
    {
        $this->notificationRepository = $notificationRepository;
    }

    public function push_welcome($user)
    {
        $message = 'Chào mừng bạn đến với Investdor.';;
        $type = 'welcome';
        $title = 'Đăng ký thành công';
        $this->create_notification_user($user['id'], $title, $type, $message);
    }

    public function create_notification_user($user_id, $title, $type, $message)
    {
        $data = [
            Notification::USER_ID => $user_id,
            Notification::STATUS => 1, //1: new, 2 : read, 3: block,
            Notification::CONTENT => $message,
            Notification::TYPE => $type,
            Notification::TITLE => $title,
        ];
        $this->notificationRepository->create($data);
    }

    public function get_by_user()
    {
        return $this->notificationRepository->get_by_user();
    }
}
