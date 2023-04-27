<?php

namespace CommentApp\Factories;

use App\Models\User;
use CommentApp\Model\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;
use PostApp\Models\Post;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Comment::class;
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'post_id' => Post::factory(),
            'body' => $this->faker->paragraph()
        ];
    }
}
