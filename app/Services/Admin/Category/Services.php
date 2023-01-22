<?php

namespace App\Services\Admin\Category;

use App\Models\Category;

class Services
{
    public function store($data)
    {
        return Category::firstOrCreate($data);
    }

    public function update($data, $category)
    {
        $category->update($data);
    }
}
