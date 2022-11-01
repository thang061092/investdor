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

    public function get_all_project($request)
    {
        $query = DB::table('real_estate_project')
            ->get();
        return $query;
    }
}
