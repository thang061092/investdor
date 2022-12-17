<?php


namespace App\Http\Repositories;


use App\Models\Notification;

class NotificationRepository extends BaseRepository
{
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return Notification::class;
    }

    public function get_by_user()
    {
        return $this->model
            ->where(Notification::USER_ID, session()->get('customer')['id'])
            ->limit(5)
            ->get();
    }
}
