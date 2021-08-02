<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Filters\CategoryFilter;
use App\Http\Requests\Category\FilterRequest;
use App\Models\Category;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(CategoryFilter::class, ['queryParams' => array_filter($data)]);

        $categories = Category::filter($filter)->get();

        foreach ($categories as $category) {
            $category['count'] = Post::where('category_id', $category['id'])->count();
        }

        return view('admin.category.index', compact('categories'));
    }
}
