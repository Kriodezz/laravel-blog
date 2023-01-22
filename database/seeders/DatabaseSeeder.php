<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         Category::factory(10)->create();
         $tags = Tag::factory(15)->create();
         $posts = Post::factory(30)->create();
         $users = User::factory(7)->create();
         Comment::factory(10)->create();

        foreach ($posts as $post) {
            $tagIds = $tags->random(rand(1,3))->pluck('id');
            $post->tags()->attach($tagIds);
            $userIds = $users->random(rand(0, 7))->pluck('id');
            $post->users()->attach($userIds);
        }
    }
}
