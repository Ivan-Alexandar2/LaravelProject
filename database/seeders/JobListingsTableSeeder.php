<?php

namespace Database\Seeders;

use App\Models\Job; // Импортирай модела Job
use Illuminate\Database\Seeder;

class JobListingsTableSeeder extends Seeder
{
    public function run()
    {       
        Job::create([
            'title' => 'Senior Laravel Developer',
            'description' => 'We are looking for an experienced Laravel developer.',
            'company' => 'Tech Corp',
            'location' => 'Remote',
            'salary' => '$80k - $120k',
            'image' => 'laravel.png',
            'category' => 'web-development',
        ]);

        Job::create([
            'title' => 'Frontend Developer (React)',
            'description' => 'We need a skilled React developer.',
            'company' => 'Code Masters',
            'location' => 'New York',
            'salary' => '$70k - $100k',
            'image' => 'react.png',
            'category' => 'web-development', 
        ]);
    }
}
