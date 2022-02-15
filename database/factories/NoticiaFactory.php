<?php

namespace Database\Factories;

use App\Models\noticia;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Noticia>
 */
class NoticiaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence(3),
            'descripcion' => $this->faker->paragraph(),
            'imagen' => $this->faker->imageUrl(360, 360, 'animals', true, 'dogs', true),
            'categoria_id' => $this->faker->numberBetween(1, 5),
            'autor_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
