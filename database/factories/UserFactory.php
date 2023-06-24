<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'breed' => fake()->randomElement([
                'turkish_angora',
                'siamese',
                'scottish_fold',
                'russian_blue',
                'munchkin',
                'korean_short_hair',
                'snowshoe',
            ]),
            'age' => fake()->numberBetween(1, 15),
            'color' => fake()->randomElement([
                'white',
                'gray',
                'black',
                'tricolor',
                'tuxedo',
                'mackerel',
                'cheese',
            ]),
            'is_mentor' => rand(0, 1),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
