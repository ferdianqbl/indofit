<?php

namespace Database\Factories;

use App\Models\CoachDomain;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'train_date' => fake()->date(),
            'train_since' => fake()->time(),
            'train_until' => fake()->time(),
            'coach_domain_id' => fake()->randomElement(CoachDomain::pluck('id')),
            'order_id' => fake()->randomElement(Order::pluck('id')),
        ];
    }
}
