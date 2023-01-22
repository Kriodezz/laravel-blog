<?php

namespace App\Services\Post\Comment;

use App\Models\Comment;

class Services
{
    public function store($data)
    {
        Comment::create($data);
    }
}
