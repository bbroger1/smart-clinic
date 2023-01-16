<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Doctor;

class DoctorFactory extends Factory
{
    protected $model = Doctor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName(),
            'lastName' => $this->faker->lastName(),
            'phoneNumber' => $this->faker->unique()->numerify('(##) #####-####'),
            'cpf' => $this->faker->unique()->numerify('###.###.###-##'),
            'genre' => $this->faker->numberBetween(1, 6),
            'city' => 'Ocara',
            'uf' => 'CE',
            'area' => $this->faker->numberBetween(1, 9)
        ];
    }
}
