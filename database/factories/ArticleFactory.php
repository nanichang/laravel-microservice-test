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
            'title' => $this->faker->title(),
            'cover' => 'https://via.placeholder.com/728x350',
            'full_text' => $this->faker->text(),
            'tags' => array([
                'name' => $this->faker->word(),
                'url' => $this->faker->url()
            ]),
        ];
    }
}
