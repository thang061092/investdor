<?php


namespace Modules\Backend\Http\Repository;


use Modules\Mysql\Models\User;
use Modules\Mysql\Repositories\BaseRepository;

class UserRepository extends BaseRepository
{
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return User::class;
    }
}
