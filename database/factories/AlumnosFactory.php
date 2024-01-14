<?php

namespace Database\Factories;


use App\Models\Alumnos;
use App\Models\Cursos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumnos>
 */
class AlumnosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'matricula' => $this->faker->unique()->regexify('[A-Z0-9]{20}'), // Genera una cadena alfanumérica de longitud 20, 
        'nombre'=> $this->faker->text(70),
        'apellido'=> $this->faker->text(70),
        'domicilio'=> $this->faker->text(70),
        'celular'=>$this->faker->regexify('[0-9]{12}'), // Genera un número de celular de longitud 10
        'fecha_nacimiento'=> $this->faker->date(),
        'email'=>$this->faker->unique()->safeEmail,
        'cursos_id'=>Cursos::factory(), // Relación con la factory de cursos
        ];
    }
}
