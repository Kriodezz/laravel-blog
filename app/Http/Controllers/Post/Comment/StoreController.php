<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Requests\Post\Comment\StoreRequest;
use App\Models\Post;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request, Post $post)
    {
        $data = $request->validated();

        $data['user_id'] = auth()->user()->id;
        $data['post_id'] = $post->id;

        $this->service->store($data);

        return redirect()->route('posts.show', $post->id);
    }
}
