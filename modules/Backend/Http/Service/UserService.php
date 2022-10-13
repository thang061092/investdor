<?php


namespace Modules\Backend\Http\Service;


use Modules\Backend\Http\Repository\UserRepository;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function find($id)
    {
        return $this->userRepository->find($id);
    }
}
