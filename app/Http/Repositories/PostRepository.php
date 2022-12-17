<?php


namespace App\Http\Repositories;


use App\Models\Posts;

class PostRepository extends BaseRepository
{
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return Posts::class;
    }

    public function get_list($request)
    {
        $model = $this->model;
        return $model->paginate(20);
    }

    public function get_parent()
    {
        return $this->model
            ->whereNull(Posts::PARENT_ID)
            ->get();
    }
}
