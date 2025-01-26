<?php

namespace Database\Seeders;

use App\Models\Job; // Импортирай модела Job
use Illuminate\Database\Seeder;

class JobListingsTableSeeder extends Seeder
{
    public function run()
    {
        $jobs = [
            [
                'title' => 'Senior Web Developer',
                'description' => 'We are looking for an experienced web developer to join our team.',
                'company' => 'Tech Corp',
                'location' => 'Remote',
                'salary' => 7000,
                'image' => 'images/companies/TechCorp.png',
                'category' => 'web-development',
            ],
            [
                'title' => 'Mobile App Developer',
                'description' => 'Join our team to develop cutting-edge mobile applications.',
                'company' => 'Dev Solutions',
                'location' => 'New York',
                'salary' => 6500,
                'image' => 'images/companies/devSolutions.jpg',
                'category' => 'mobile-development',
            ],
            [
                'title' => 'Data Scientist',
                'description' => 'We need a data scientist to analyze and interpret complex data.',
                'company' => 'Data Innovators',
                'location' => 'Berlin',
                'salary' => 8000,
                'image' => 'images/companies/dataInnovators.jpg',
                'category' => 'data-science',
            ],
            [
                'title' => 'UX management',
                'description' => 'We need a UX manager to manage the UX design.',
                'company' => 'Data Innovators',
                'location' => 'Berlin',
                'salary' => 9200,
                'image' => 'images/companies/dataInnovators.jpg',
                'category' => 'ui-ux-design',
            ],          
            // Mogat da se dobavqt oshte tuk
        ];

        foreach ($jobs as $job) {
            Job::create($job);
        }
    }
}
