<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ApiTask>
 */
class ApiTaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=> $this->faker->randomElement(User::pluck('id')),
            'name'=> $this->faker->word(),
            'is_completed'=>$this->faker->randomElement([0,1])
        ];
    }
}
