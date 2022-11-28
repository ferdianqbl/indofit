<?php

namespace Database\Factories;

use App\Models\Coach;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => (string)Str::uuid(),
            'rating' => rand(1, 5),
            'description' => fake()->text(100),
            'coach_id' => fake()->randomElement(Coach::pluck('id')),
            'user_id' => fake()->randomElement(User::pluck('id')),
        ];
    }
}
