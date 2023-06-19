<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
//creamos datos fake para la base
class autoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'marca' => $this->faker->firstName(),
            'modelo'=> $this->faker->lastName(),
            'color' => $this->faker->safeColorName(),
            'puertas' => $this->faker->randomDigit(),
            'cilindrado' => $this->faker->randomDigit(),
            'automatico' => $this->faker->numberBetween($min=0, $max=1),
            'electronico' => $this->faker->numberBetween($min=0, $max=1)
        ];
    }
}
