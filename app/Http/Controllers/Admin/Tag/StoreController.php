<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Requests\Tag\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $flash = $this->service->store($data);

        return redirect()->route('admin.tag.index')->with($flash);;
    }
}
