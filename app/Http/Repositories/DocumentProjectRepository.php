<?php


namespace App\Http\Repositories;


use App\Models\DocumentProject;

class DocumentProjectRepository extends BaseRepository
{
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return DocumentProject::class;
    }
}
