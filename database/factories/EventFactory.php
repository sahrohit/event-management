<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->sentence(3),
            'description' => $this->faker->paragraph(3),
            'time_begin' => $this->faker->dateTimeBetween('now', '+1 year'),
            'time_end' => $this->faker->dateTimeBetween('+1 year', '+2 year'),
            'location' => $this->faker->city(),
        ];
    }
}