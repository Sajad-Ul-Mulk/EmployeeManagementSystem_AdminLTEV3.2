<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->jobTitle(),
            'description' => $this->faker->paragraph(),
            'priority' => $this->faker->numberBetween(1,10),
            'status' => $this->faker->randomElement(['open','in progress','on hold','completed']),
            'user_id' => $this->faker->numberBetween(1,20),
            'task_approval_id' => 0,
            'estimated_completion_time' => $this->faker->dateTimeBetween('now','+2 weeks'),
        ];
    }
}
