<?php

namespace App\Http\Controllers\Post;

use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);

        $posts = Post::filter($filter)->paginate(20);

        $posts = $this->service->index($posts)->sortByDesc('updated_at');

        $categories = Category::all();
        foreach ($categories as $category) {
            $category = $category->posts->count();
        }

        dd($categories);

        return view('post.index', compact('posts'));
    }
}
