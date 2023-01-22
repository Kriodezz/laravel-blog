<?php

namespace App\Services\Admin\Post;

use App\Models\Post;
use Illuminate\Support\Facades\DB;

class Services
{
    public function store($data)
    {
        try {
            DB::beginTransaction();
            if (isset($data['tags'])) {
                $tags = $data['tags'];
                unset($data['tags']);
            } else {
                $tags = [];
            }
            $post = Post::firstOrcreate($data);
            $post->tags()->attach($tags);
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            return $e->getMessage();
        }

        return $post;
    }

    public function update($data, $post)
    {
        try {
            DB::beginTransaction();
            if (isset($data['tags'])) {
                $tags = $data['tags'];
                unset($data['tags']);
            } else {
                $tags = [];
            }
            $post->update($data);
            $post->tags()->sync($tags);
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            return $e->getMessage();
        }

        return $post->fresh();
    }
}
