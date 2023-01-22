<?php

namespace App\Services\Personal\Comment;

class Services
{
    public function update($data, $comment)
    {
        $comment->update($data);
    }
}
