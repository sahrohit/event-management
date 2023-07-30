<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Participant>
 */
class ParticipantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'event_id' => $this->faker->randomElement(['1', '2', '3', '4', '5', '6', '7', '8', '9', '10']),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone_number' => $this->faker->phoneNumber(),
            'country' => $this->faker->country(),
            'emergency_contact' => $this->faker->phoneNumber(),
            'require_parking' => $this->faker->boolean(),
            'room_preference' => $this->faker->randomElement(['single', 'shared', 'none']),
            'food_preference' => $this->faker->randomElement(['vegetarian', 'vegan', 'none']),
            'id_type' => $this->faker->randomElement(['citizenship', 'voter_id', 'passport']),
            'id_number' => $this->faker->regexify('[0-9]{10}'),
            'pnr' => $this->faker->regexify('[A-Z]{8}'),
        ];
    }
}