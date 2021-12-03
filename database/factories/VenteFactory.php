<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VenteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'qtevendu' => $this->faker->randomNumber(2),
            'datevente' => $this->faker->dateTime(),
            'prixvendu' => $this->faker->randomNumber(3),
        ];
    }
}
