<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::all();

        if ($posts->isEmpty()) {
            return;
        }

      
        foreach ($posts as $post) {
            Comment::factory()
                ->count(rand(1, 5))
                ->create([
                    'post_id' => $post->id,
                ]);
        }
    }
}
