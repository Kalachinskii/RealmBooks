<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(5), // Генерирует случайное название из 5 слов
            // 'countent' => $this->faker->text(50), 
            'countent' => $this->faker->paragraph(),
            'image' => $this->faker->imageUrl(), // Генерирует случайное url
            'author' => $this->faker->name(), // Генерирует случайное имя
            'likes' => random_int(0, 1000), // Генерирует случайное число
            'is_published' => 1,
        ];
    }
}
