<?php

namespace Database\Factories;
use App\Models\Comment;
use App\Models\Post; 

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
        protected $model = Comment::class;

    public function definition(): array
    {
        return [
            'body'    => $this->faker->sentence(10),
            'post_id' => Post::inRandomOrder()->value('id') ?? Post::factory(), 
        ];
    }
}
