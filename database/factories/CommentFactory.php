<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\User; 
use App\Models\Ticket; 

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
            'user_id' => User::factory(), 
            'ticket_id' => Ticket::factory(),
            'content' => $this->faker->paragraph, 
        ];
    }
}
