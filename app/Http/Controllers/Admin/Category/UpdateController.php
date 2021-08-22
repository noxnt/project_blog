<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();

        $data = $this->service->update($category, $data);

        return redirect()->route('admin.category.show', $data['id'])->with($data['flash']);
    }
}
