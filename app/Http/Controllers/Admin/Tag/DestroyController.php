<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Models\Tag;

class DestroyController extends BaseController
{
    public function __invoke(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('admin.tags.index');
    }
}
