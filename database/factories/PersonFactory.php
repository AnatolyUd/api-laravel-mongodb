<?php

namespace Database\Factories;

use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Person::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'login' => $this->faker->firstName(),
            'email' => $this->faker->email(),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'age' => $this->faker->year(),
            'gender' => $this->faker->randomElement(['male','female']),
            'mobile_number' => $this->faker->phoneNumber(),
            'city' => $this->faker->city(),
            'car_model' => $this->faker->name(),
            'salary' => $this->faker->buildingNumber(),
        ];
    }
}
