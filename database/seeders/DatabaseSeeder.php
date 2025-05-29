<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Job;
use App\Models\User;
use App\Models\Employer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Kael Ashfall',
            'email' => 'job_board@email.com',
        ]);

        User::factory(300)->create();

        $users = User::all()->shuffle();

        for ($i = 0; $i < 20; $i++) {
            Employer::factory()->create([
                'user_id' => $users->pop()->id,
            ]);
        }

        $employers = Employer::all();

        for ($i = 0; $i < 100; $i++) {
            Job::factory()->create([
                'employer_id' => $employers->random()->id,
            ]);
        }

        foreach ($users as $user) {
            $jobs = \App\Models\Job::inRandomOrder()->take(rand(0, 4))->get(); // get 0 to 4 random jobs

            foreach ($jobs as $job) {
                \App\Models\JobApplication::factory()->create([ // create a job application for each job
                    'job_id' => $job->id,
                    'user_id' => $user->id,
                ]);
            }
        }

        // Job::factory(100)->create();
    }
}