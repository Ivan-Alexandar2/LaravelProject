<?php

namespace Database\Seeders;

use App\Models\Job; // Импортирай модела Job
use Illuminate\Database\Seeder;

class JobListingsTableSeeder extends Seeder
{
    public function run()
    {
        Job::create([
            'title' => 'Senior Web Developer',
            'description' => 'We are looking for an experienced web developer.',
            'company' => 'Tech Corp',
            'location' => 'Remote',
            'salary' => 7000,
            'category' => 'web-development',
        ]);

        Job::create([
            'title' => 'Mobile App Developer',
            'description' => 'Join our team to develop mobile applications.',
            'company' => 'Dev Solutions',
            'location' => 'New York',
            'salary' => 6500,
            'category' => 'mobile-development',
        ]);

        // Нови обяви
        Job::create([
            'title' => 'Game Developer',
            'description' => 'We are looking for a talented game developer.',
            'company' => 'Game Studios',
            'location' => 'Los Angeles',
            'salary' => 7500,
            'category' => 'game-development',
        ]);

        Job::create([
            'title' => 'AI Engineer',
            'description' => 'Join our team to develop cutting-edge AI solutions.',
            'company' => 'AI Innovators',
            'location' => 'San Francisco',
            'salary' => 8000,
            'category' => 'ai-machine-learning',
        ]);

        Job::create([
            'title' => 'Cloud Architect',
            'description' => 'We need a cloud architect to design and implement cloud solutions.',
            'company' => 'Cloud Experts',
            'location' => 'Seattle',
            'salary' => 8500,
            'category' => 'cloud-computing',
        ]);

        foreach ($jobs as $job) {
            Job::create($job);
        }
    }
}
