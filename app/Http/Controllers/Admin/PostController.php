<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BaseController;
use App\Http\Requests\FormCreatePost;
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

    public function create()
    {
        $parents = $this->postService->get_parent();
        return view('employee.posts.create', compact('parents'));
    }

    public function store(FormCreatePost $request)
    {
        toastr()->success(__('message.success'));
        $this->postService->create($request);
        return redirect()->route('post.index');
    }

    public function detail($id)
    {
        $post = $this->postService->find($id);
        $parents = $this->postService->get_parent();
        return view('employee.posts.detail', compact('post', 'parents'));
    }

    public function update(FormCreatePost $request)
    {
        toastr()->success(__('message.success'));
        $this->postService->update($request);
        return redirect()->route('post.index');
    }
}
