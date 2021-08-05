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

        $tags = Tag::filter($filter)->get();

        foreach ($tags as $tag) {
            $tag['count'] = PostTag::where('tag_id', $tag['id'])->count();
        }

        return view('admin.tag.index', compact('tags'));
    }
}
