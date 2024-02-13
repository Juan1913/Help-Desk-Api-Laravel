<?php

namespace Database\Factories;

use App\Models\Ticket;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' =>User::factory(),
            'category_name' =>Category::factory(),
            'title' =>$this->faker->sentence,
            'description' => $this->faker->paragraph, 
            'status'=> $this->faker->randomElement(['abierto', 'pendiente', 'cerrado']), 
            'assigned_to'=> User::factory(),
            'priority' => $this->faker->randomElement(['alta', 'medio', 'baja']),
        ];
    }
}
