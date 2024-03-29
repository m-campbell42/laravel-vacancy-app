<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Vacancy;
use App\Models\Skill; 

class JsonSeeder extends Seeder
{
    public function run()
    {
        // Truncate tables
        User::truncate();
        Vacancy::truncate();
        Skill::truncate();

        // Decode JSON data
        $jsonData = json_decode(file_get_contents(database_path('data/laravel_developer_data.json')), true);

        // Seed Users
        $users = []; // Define an array to hold user instances
    foreach ($jsonData['users'] as $userData) {
        $user = User::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'password' => Hash::make('password4321'), // Set a default password
            // Add other fields as necessary
        ]);
        array_push($users, $user);
        }

        // Seed Vacancies
        foreach ($jsonData['vacancies'] as $vacancyData) {
            $user = $users[array_rand($users)]; // Randomly pick a user for each vacancy
            Vacancy::create([
                'user_id' => $user->id, // Assign the user ID
                'title' => $vacancyData['title'],
                'description' => $vacancyData['description'],
                'required_skills' => is_array($vacancyData['required_skills']) ? implode(', ', $vacancyData['required_skills']) : $vacancyData['required_skills'],
                // other fields...
            ]);
        }

        // Seed Skills
        foreach ($jsonData['skills'] as $skillData) {
            Skill::create(['name' => $skillData]); // Adjust based on your Skill model structure
        }
    }
}
