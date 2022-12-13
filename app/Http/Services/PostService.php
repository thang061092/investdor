<?php


namespace App\Http\Services;


use App\Http\Repositories\PostRepository;

class PostService
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function get_list($request)
    {
        return $this->postRepository->get_list($request);
    }
}
