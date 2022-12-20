<?php


namespace App\Http\Repositories;

use App\Models\FeedBack;
use Carbon\Carbon;

class FeedBackRepository extends BaseRepository
{
    public function getModel()
    {
        return FeedBack::class;
    }
}
