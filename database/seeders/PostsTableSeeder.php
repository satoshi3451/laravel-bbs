<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Comment;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Post::class, 50)
        Post::factory()->count(50)
            ->create()
            ->each(function ($post) {
                // $comments = factory(App\Models\Comment::class, 2)->make();
                $comments = \App\Models\Comment::factory()->count(2)->make();
                $post->comments()->saveMany($comments);
            });
    }
}
