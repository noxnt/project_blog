<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Category;
use App\Models\Tag;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.create', compact('tags', 'categories'));
    }
}
