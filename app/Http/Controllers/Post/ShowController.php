<?php

namespace App\Http\Controllers\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class ShowController extends BaseController
{
    public function __invoke(Post $post)
    {
        $posts = Post::all();
        $categories = Category::all();
        $tags = Tag::all();

        $currentPost = $this->service->getDates([$post])[0];

        return view('post.show', compact(['currentPost', 'posts', 'categories', 'tags']));
    }
}
