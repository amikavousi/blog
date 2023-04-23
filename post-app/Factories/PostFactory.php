<?php

namespace PostApp\Factories;

use App\Models\User;
use CategoryApp\Model\Category;
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
            'description' => $this->faker->paragraph(4),
            'summary' => $this->faker->paragraph(),
            'category_id' => Category::factory(),
            'user_id' => User::factory()
        ];
    }
}
