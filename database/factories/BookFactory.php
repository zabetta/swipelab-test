<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'price' => $this->faker->randomFloat(2),
            'ean' => $this->faker->ean13(),
            'image_url' => $this->faker->imageUrl(),
            'author' => $this->faker->name()
        ];
    }
}
