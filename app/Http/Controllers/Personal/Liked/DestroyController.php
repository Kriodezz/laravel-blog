<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;
use App\Models\Post;
use function view;

class DestroyController extends Controller
{
    public function __invoke(Post $post)
    {
        auth()->user()->posts()->detach($post->id);

        return redirect()->route('personal.liked.index');
    }
}
