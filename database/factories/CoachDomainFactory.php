<?php

namespace Database\Factories;

use App\Models\Coach;
use App\Models\Sport;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CoachDomain>
 */
class CoachDomainFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

        return [
            'id' => (string)Str::uuid(),
            'working_days' => fake()->randomElement($days),
            'working_time_start' => fake()->time(),
            'working_time_end' => fake()->time(),
            'price' => (string)rand(50000, 500000),
            'sport_id' => fake()->randomElement(Sport::pluck('id')),
            'coach_id' => fake()->randomElement(Coach::pluck('id')),
        ];
    }
}
