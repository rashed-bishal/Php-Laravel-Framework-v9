<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Company;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName($gender = 'male' | 'female'),
            'last_name' => $this->faker->lastName($gender = 'male' | 'female'),
            'address' => $this->faker->address(),
            'phone' => $this->faker->numerify('+88017##-######' | '+88018##-######'| '+88019##-######'| '+88016##-######'| '+88015##-######'),
            'email' => $this->faker->email(),
            'company_id' => Company::pluck('id')->random(),
        ];
    }
}
