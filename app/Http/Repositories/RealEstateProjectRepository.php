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
        $query = DB::table('real_estate_project')
            ->paginate(20);
        return $query;
    }

    public function list_project_investor($request)
    {
        $limit = $request->limit ?? 6;
        $offset = $request->offset ?? 0;
        $query = $this->model
            ->limit((int)$limit)
            ->offset((int)$offset)
            ->orderBy(RealEstateProject::CREATED_AT, self::DESC)
            ->get();
        return $query;
    }
}
