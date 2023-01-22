<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::paginate(6);

        $popularPosts = Post::withCount('likedUsers')  //количество связей
            ->orderBy('liked_users_count', 'DESC')
            ->get()
            ->take(5); //количество - 5

        return view('posts.index', compact('posts', 'popularPosts'));
    }
}
