<?php


namespace App\Http\Repositories;

use App\Models\Projects;

class ProjectRepository extends BaseRepository
{

    public  function getModel(){
        // TODO: Implement getModel() method.
        return Projects::class;
    }

}
