<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Requests\Tag\UpdateRequest;
use App\Models\Tag;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Tag $tag)
    {
        $data = $request->validated();

        $data = $this->service->update($tag, $data);

        return redirect()->route('admin.category.show', $data['id'])->with($data['flash']);
    }
}
