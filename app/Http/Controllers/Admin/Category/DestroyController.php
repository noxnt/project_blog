<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;

class DestroyController extends BaseController
{
    public function __invoke(Category $category)
    {
        $flash = $this->service->destroy($category);

        return redirect()->route('admin.category.index')->with($flash);
    }
}
