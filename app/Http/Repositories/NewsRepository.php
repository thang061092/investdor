<?php


namespace App\Http\Repositories;

use App\Models\News;

class NewsRepository extends BaseRepository
{
    public function getModel()
    {
        return News::class;
    }

}
