<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class WorkoutStepFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'workout_id' => 1,
            'order' => $this->faker->unique()->numberBetween(1, 10),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'repetitions' => $this->faker->numberBetween(1, 20),
            'time' => $this->faker->numberBetween(30, 300),
        ];
    }
}
