<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->paragraph(2),
            'cover' => 'https://via.placeholder.com/728x350',
            'full_text' => $this->faker->text(),
            'short_description' => $this->faker->text(100),
            'tags' => array([
                'name' => $this->faker->word(),
                'url' => $this->faker->url()
            ]),
        ];
    }
}
