<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User; 
use App\Models\Vacancy; 


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
            'user_id' => User::inRandomOrder()->first()->id, // Fetch a random user ID
            'vacancy_id' => Vacancy::inRandomOrder()->first()->id, // Fetch a random vacancy ID
            'content' => $this->faker->sentence,
        ];
    }
}
