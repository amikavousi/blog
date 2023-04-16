<?php

namespace Database\Seeders;

use CategoryApp\Model\Category;
use Illuminate\Database\Seeder;
use PostApp\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         \App\Models\User::factory(10)->create();
//           Category::factory(3)->create();

        Post::factory(5)->create([
//            'category_id' => 3,
//            'user_id' => 3
        ]);
    }
}
