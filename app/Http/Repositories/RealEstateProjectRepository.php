<?php


namespace App\Http\Repositories;


use App\Models\RealEstateProject;
use Illuminate\Support\Facades\DB;

class RealEstateProjectRepository extends BaseRepository
{
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return RealEstateProject::class;
    }

    public function getAllPaginate($request)
    {
        $model = $this->model
            ->orderBy(RealEstateProject::CREATED_AT, self::DESC)
            ->paginate(30);
        return $model;
    }

    public function list_project_investor($request)
    {
        $limit = $request->limit ?? 6;
        $offset = $request->offset ?? 0;
        $model = $this->model;
        if (!empty($request->name_project)) {
            $name = $request->name_project;
            $model = $model->where(function ($query) use ($name) {
                return $query->where(RealEstateProject::NAME_VI, 'LIKE', "%$name%")
                    ->orWhere(RealEstateProject::NAME_EN, 'LIKE', "%$name%");
            });
        }

        if (!empty($request->arr_status)) {
            $model = $model->whereIn(RealEstateProject::STATUS, $request->arr_status);
        }

        $model = $model->limit((int)$limit)
            ->offset((int)$offset)
            ->orderBy(RealEstateProject::CREATED_AT, self::DESC)
            ->get();
        return $model;
    }

    public function find_project_by_slug($slug)
    {
        $model = $this->model
            ->where(function ($query) use ($slug) {
                return $query->where(RealEstateProject::SLUG_VI, $slug)
                    ->orWhere(RealEstateProject::SLUG_EN, $slug);
            });
        return $model->first();
    }
}
