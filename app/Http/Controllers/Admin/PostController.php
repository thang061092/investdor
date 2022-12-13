<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BaseController;
use App\Http\Services\PostService;
use Illuminate\Http\Request;

class PostController extends BaseController
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index(Request $request)
    {
        $posts = $this->postService->get_list($request);
        return view('employee.posts.index', compact('posts'));
    }
}
