<?php

namespace App\Http\Controllers\Post;

use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate(20);

        $posts = $this->service->index($posts)->sortByDesc('updated_at');

        $categories = Category::all();
        $tags = Tag::all();

        return view('post.index', compact(['posts', 'categories', 'tags']));
    }
}
