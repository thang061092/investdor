<?php


namespace App\Http\Services;


use App\Http\Repositories\PostRepository;
use App\Models\Posts;
use Illuminate\Support\Facades\Session;

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

    public function create($request)
    {
        $data = [
            Posts::TITLE_VI => $request->title_vi,
            Posts::TITLE_EN => $request->title_en,
            Posts::PARENT_ID => $request->parent,
            Posts::CONTENT_VI => $request->content_vi,
            Posts::CONTENT_EN => $request->content_en,
            Posts::SLUG => slugify($request->title_vi),
            Posts::STATUS => 'active',
            Posts::CREATED_BY => Session::get('employee')['email'],
        ];
        return $this->postRepository->create($data);
    }

    public function get_post_home_page()
    {
        return $this->postRepository->getAll();
    }

    public function detail($slug)
    {
        return $this->postRepository->findOne([Posts::SLUG => $slug]);
    }

    public function get_parent()
    {
        return $this->postRepository->get_parent();
    }
}
