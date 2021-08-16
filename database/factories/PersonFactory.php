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
            'properties' => $this->properties()
        ];
    }

    /**
     * Define the model's properties.
     *
     * @return array
     */
    public function properties()
    {
        $firstName = substr($this->faker->firstName(), 0, 1);
        $lastName = substr($this->faker->lastName(), 0, 1);

        return [
                ['login' => $firstName.$lastName],
                ['email' => $this->faker->email()],
                ['first_name' => $firstName],
                ['last_name' => $lastName],
                ['age' => $this->faker->year()],
                ['gender' => $this->faker->randomElement(['male','female'])],
                ['mobile_number' => $this->faker->phoneNumber()],
                ['city' => $this->faker->city()],
                ['car_model' => $this->faker->name()],
                ['salary' => $this->faker->buildingNumber()],
            ];
    }

}
