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
        $model = $this->model;
        if (!empty($request->start) && !empty($request->end)) {
            $start = $request->start . ' 00:00:00';
            $end = $request->end . ' 23:59:59';
            $model = $model->whereBetween(RealEstateProject::CREATED_AT, [$start, $end]);
        }

        $model = $model->orderBy(RealEstateProject::CREATED_AT, self::DESC)
            ->paginate(30);
        return $model;
    }

    public function list_project_investor($request)
    {
        $limit = $request->limit ?? 100;
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

        if (!empty($request->investment) && !empty($request->arr_project_user)) {
            if ($request->investment == 1) {
                $model = $model->whereIn(RealEstateProject::ID, $request->arr_project_user);
            } elseif ($request->investment == 2) {
                $model = $model->whereNotIn(RealEstateProject::ID, $request->arr_project_user);
            }
        }

        $model = $model
            ->whereNotIn(RealEstateProject::STATUS, [RealEstateProject::NEW])
            ->limit((int)$limit)
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

    public function list_project_index($request)
    {
        $model = $this->model
            ->whereNotIn(RealEstateProject::STATUS, [RealEstateProject::NEW])
            ->limit(10)
            ->orderBy(RealEstateProject::CREATED_AT, self::DESC)
            ->get();
        return $model;
    }

}
