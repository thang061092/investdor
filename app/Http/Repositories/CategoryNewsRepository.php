<?php


namespace App\Http\Repositories;

use App\Models\CategoryNews;

class CategoryNewsRepository extends BaseRepository
{
    public function getModel()
    {
        return CategoryNews::class;
    }

}
