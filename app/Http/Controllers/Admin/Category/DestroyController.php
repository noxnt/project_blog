<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class DestroyController extends Controller
{
    public function __invoke(Category $category)
    {
        $posts = Post::where('category_id', $category->id)->get();
        if (count($posts) > 0)
            dd('You cannot delete this category, '.count($posts).' posts are linked to it');
        else
            $category->delete();

        return redirect()->route('admin.category.index');
    }
}
