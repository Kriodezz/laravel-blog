<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;
use App\Models\Post;
use function view;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = auth()->user()->posts;

        return view('personal.liked.index', compact('posts'));
    }
}
