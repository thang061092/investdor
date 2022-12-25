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

        if (!empty($request->start) && !empty($request->end)) {
            $start = $request->start . ' 00:00:00';
            $end = $request->end . ' 23:59:59';
            $model = $model->whereBetween(Posts::CREATED_AT, [$start, $end]);
        }
        $model = $model->orderBy(Posts::CREATED_AT, self::DESC)
            ->paginate(20);
        return $model;
    }

    public function get_parent()
    {
        return $this->model
            ->whereNull(Posts::PARENT_ID)
            ->get();
    }
}
