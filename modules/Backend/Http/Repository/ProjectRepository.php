<?php


namespace Modules\Backend\Http\Repository;

use Modules\Mysql\Models\Project;
use Modules\Mysql\Repositories\BaseRepository;

class ProjectRepository extends BaseRepository
{
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return Project::class;
    }




}
