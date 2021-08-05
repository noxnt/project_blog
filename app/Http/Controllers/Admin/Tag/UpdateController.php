<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Tag;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Tag $tag)
    {
        $data = $request->validated();

        $tag = $this->service->update($tag, $data);

        return redirect()->route('admin.category.show', $tag['id']);
    }
}
