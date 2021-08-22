<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Filters\TagFilter;
use App\Http\Requests\Tag\FilterRequest;
use App\Models\PostTag;
use App\Models\Tag;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(TagFilter::class, ['queryParams' => array_filter($data)]);

        $tags = Tag::filter($filter)->paginate(20);

        return view('admin.tag.index', compact('tags'));
    }
}
