<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $liked = auth()->user()->posts()->count();
        $comments = auth()->user()->comments()->count();

        return view('personal.index', compact('liked', 'comments'));
    }
}
