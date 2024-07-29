<?php

namespace database\seeders;

use app\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::factory()
            ->count(50)
            ->hasPhotos(1)
            ->hasRecipes(1)
            ->create();
    }
}
