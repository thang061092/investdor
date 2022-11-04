<?php


namespace App\Http\Repositories;


use App\Models\ImageProject;

class ImageProjectRepository extends BaseRepository
{
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return ImageProject::class;
    }

    public function delete_image_project($project_id)
    {
        $model = $this->model;
        $model->where(ImageProject::REAL_ESTATE_PROJECT_ID, $project_id)
            ->delete();
        return;
    }
}
