<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Conference>
 */
class ConferenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startsAt = now()->addMonths(rand(1, 4));

        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'url' => fake()->url(),
            'location' => fake()->city(),
            'starts_at' => $startsAt,
            'ends_at' => $startsAt->clone()->addDays(rand(1, 5)),
            'cfp_starts_at' => $startsAt->clone()->subMonths(2),
            'cfp_ends_at' => $startsAt->clone()->subMonths(1),
        ];
    }
}
