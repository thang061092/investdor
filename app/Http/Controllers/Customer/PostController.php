<?php


namespace App\Http\Controllers\Customer;


use App\Http\Controllers\BaseController;
use App\Http\Services\PostService;

class PostController extends BaseController
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function detail($slug)
    {
        $post = $this->postService->detail($slug);
        return view('customer.home.detail-post', compact('post'));
    }
}
