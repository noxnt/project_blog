<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use App\Models\PostTag;

class DestroyController extends BaseController
{
    public function __invoke(Post $post)
    {
        $postTags = PostTag::where('post_id', $post->id)->get();

        $this->service->destroy($postTags, $post);

        return redirect()->route('admin.post.index')->withQuery('?page=6');
    }
}