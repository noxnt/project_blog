<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;

class ShowController extends Controller
{
    public function __invoke(Tag $tag)
    {
        $posts = $tag->posts()->get();

        foreach($posts as $post) {
            $category = Category::find($post->category_id);
            $post['category_title'] = $category->title;
        }

        return view('admin.tag.show', compact('tag', 'posts'));
    }
}
