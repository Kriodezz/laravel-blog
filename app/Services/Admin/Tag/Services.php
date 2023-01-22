<?php

namespace App\Services\Admin\Tag;

use App\Models\Tag;

class Services
{
    public function store($data)
    {
        return Tag::firstOrCreate($data);
    }

    public function update($data, $tag)
    {
        $tag->update($data);
    }
}
