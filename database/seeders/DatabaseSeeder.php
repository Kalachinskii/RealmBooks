<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
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
        // make - создаст 10 объектов без загрузки в БД
        // $post = Post::factory(10)->make();
        $categorys = Category::factory(50)->create();
        $posts = Post::factory(300)->create();
        // реализация многие ко многим
        foreach ($posts as $post) {
            $categorysIds = $categorys->random(random_int(1, 50))->pluck('id');
            $post->categorys()->attach($categorysIds);
        }
    }
}
