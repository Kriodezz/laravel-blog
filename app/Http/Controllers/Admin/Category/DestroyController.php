<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Admin\Tag\BaseController;
use App\Models\Category;

class DestroyController extends BaseController
{
    public function __invoke(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index');
    }
}
