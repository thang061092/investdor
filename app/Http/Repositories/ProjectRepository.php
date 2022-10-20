<?php


namespace App\Http\Repositories;


use App\Http\Controllers\BaseController;
use App\Models\Project;

class ProjectRepository extends BaseController
{

    public  function getModel(){
        // TODO: Implement getModel() method.
        return Project::class;
    }

}
