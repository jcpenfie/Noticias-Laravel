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
            'imagen' => $this->faker->image('public/img', 360, 360, 'animals', false, true, 'cats', true),
            'categoria_id' => $this->faker->numberBetween(1, 5),
            'autor_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
