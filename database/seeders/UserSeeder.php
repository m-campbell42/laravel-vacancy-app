<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Vacancy;
use App\Models\Comment;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Creating additional users
        $users = User::factory(10)->create();

        // Each user leaves a comment on a random vacancy
        foreach ($users as $user) {
            Comment::factory()->create([
                'user_id' => $user->id,
                'vacancy_id' => Vacancy::inRandomOrder()->first()->id
            ]);
        }
    }
}

