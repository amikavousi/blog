<?php

namespace PostApp\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use PostApp\Models\Post;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Post::class;

    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'slug' => $this->faker->slug,
            'description' => $this->faker->text,
            'category_id' => 2,
            'user_id' => User::factory()
        ];
    }
}
