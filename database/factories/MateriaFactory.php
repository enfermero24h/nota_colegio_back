<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MateriaFactory extends Factory
{
    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
            'descripcion' => $this->faker->sentence,
        ];
    }
}
