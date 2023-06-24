<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',

        // ]);

        \App\Models\User::factory(3)->create();

        \App\Models\Question::factory(1)->create([
            'by_user_id' => 1,
        ]);

        \App\Models\Question::factory(1)->create([
            'by_user_id' => 2,
        ]);

        \App\Models\Answer::factory(3)->create([
            'by_user_id' => 3,
            'question_id' => 1,
        ]);

        \App\Models\Answer::factory(3)->create([
            'by_user_id' => 3,
            'question_id' => 2,
        ]);

    }
}
