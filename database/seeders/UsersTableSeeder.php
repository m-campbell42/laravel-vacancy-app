<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Vacancy;
use App\Models\Comment;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create 10 users
        $users = User::factory(10)->create();

        // Total number of comments to create
        $totalComments = 34;

        // Distribute comments across Laravel Developer vacancies
        foreach ($users as $user) {
            // Create Laravel Developer vacancies for each user, assume 2 each
            $vacancies = Vacancy::factory(2)->create([
                'user_id' => $user->id,
                'category' => 'Laravel Developer', // or 'title' => 'Laravel Developer Job'
                // other fields as necessary
            ]);

            foreach ($vacancies as $vacancy) {
                // Calculate the number of comments per vacancy
                $commentsPerVacancy = max(1, intdiv($totalComments, count($vacancies)));

                // Create comments for each vacancy
                Comment::factory($commentsPerVacancy)->create([
                    'vacancy_id' => $vacancy->id,
                    'user_id' => User::inRandomOrder()->first()->id // Assign a random user to each comment
                ]);

                // Adjust the total comments remaining
                $totalComments -= $commentsPerVacancy;

                // Exit the loop if all comments are created
                if ($totalComments <= 0) break 2;
            }
        }
    }
}