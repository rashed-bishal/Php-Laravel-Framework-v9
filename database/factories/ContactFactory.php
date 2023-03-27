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
            'phone' => $this->faker->regexify('01[5-9]{1}[0-9]{2}-[0-9]{6}'),
            'email' => $this->faker->email(),
            'company_id' => Company::pluck('id')->random(),
        ];
    }
}
