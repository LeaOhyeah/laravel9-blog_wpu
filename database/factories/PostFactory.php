<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2, 6)),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->paragraph(),
            'body' => collect($this->faker->paragraphs(mt_rand(5, 10)))
                ->map(fn ($item) => "<p>$item</p>")
                ->implode(""),
            // 'body' => $this->faker->paragraph(mt_rand(5, 10)),
            'user_id' => mt_rand(1, 4),
            'category_id' => mt_rand(1, 2),
        ];
    }
}
// join array dengan implode setiap array dengan delimiter </p><p>
// 'body' => 'p' . implode('</p><p>', $this->faker->paragraphs(mt_rand(5,10))) . '</p>',

// menggunakan map dan collection
// 'body' => collect($this->faker->paragraphs(mt_rand(5,10)))
//             ->map(function($item) {
//                 return "<p>$item</p>";
//             }) ,


// alternative kode baru
// 'body' => collect($this->faker->paragraphs(mt_rand(5,10)))
//             ->map(fn($item) => "<p>$item</p>") ,
