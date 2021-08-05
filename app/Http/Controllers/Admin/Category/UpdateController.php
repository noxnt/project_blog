<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();

        $category = $this->service->update($category, $data);

        return redirect()->route('admin.category.show', $category['id']);
    }
}
