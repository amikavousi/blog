<?php

namespace CategoryApp\factories;

use CategoryApp\Model\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Category::class;

    public function definition()
    {
        return [
            'title' => $this->faker->streetName,
            'slug' => $this->faker->slug,
        ];
    }
}
