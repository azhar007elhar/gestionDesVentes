<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'libelle' => $this->faker->name(),
            'marque' => $this->faker->name(),
            'prix' => $this->faker->randomNumber(2),
            'qteStock' => $this->faker->randomNumber(3),
            'image' => $this->faker->imageUrl(640,480),
        ];
    }
}
