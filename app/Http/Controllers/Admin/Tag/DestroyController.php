<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\PostTag;
use App\Models\Tag;

class DestroyController extends Controller
{
    public function __invoke(Tag $tag)
    {
        $posts = PostTag::where('tag_id', $tag->id)->get();
        if (count($posts) > 0)
            dd('You cannot delete this tag, '.count($posts).' posts are linked to it');
        else
            $tag->delete();

        return redirect()->route('admin.tag.index');
    }
}
