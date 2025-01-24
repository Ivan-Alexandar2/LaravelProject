<?php
use App\Http\Controllers\JobController;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('jobs', JobController::class);
Route::get('/jobs', function () {
    $categories = [
        ['title' => 'Web Development', 'icon' => 'fas fa-code', 'jobs' => 1200],
        ['title' => 'Mobile Development', 'icon' => 'fas fa-mobile-alt', 'jobs' => 850],
        ['title' => 'Data Science', 'icon' => 'fas fa-chart-line', 'jobs' => 700],
        ['title' => 'UI/UX Design', 'icon' => 'fas fa-palette', 'jobs' => 600],
        ['title' => 'DevOps', 'icon' => 'fas fa-server', 'jobs' => 500],
        ['title' => 'Cybersecurity', 'icon' => 'fas fa-shield-alt', 'jobs' => 400],
        ['title' => 'Game Development', 'icon' => 'fas fa-gamepad', 'jobs' => 350],
        ['title' => 'AI & Machine Learning', 'icon' => 'fas fa-robot', 'jobs' => 300],
        ['title' => 'Cloud Computing', 'icon' => 'fas fa-cloud', 'jobs' => 250],
    ];
    return view('jobs', compact('categories'));
})->name('jobs');

Route::get('/companies', function () {
    $companies = [
        ['name' => 'Tech Corp', 'logo' => 'https://via.placeholder.com/100', 'jobs' => 200, 'location' => 'Remote'],
        ['name' => 'Dev Solutions', 'logo' => 'https://via.placeholder.com/100', 'jobs' => 150, 'location' => 'New York'],
        ['name' => 'Code Masters', 'logo' => 'https://via.placeholder.com/100', 'jobs' => 120, 'location' => 'London'],
        ['name' => 'Data Innovators', 'logo' => 'https://via.placeholder.com/100', 'jobs' => 90, 'location' => 'Berlin'],
        ['name' => 'Cloud Experts', 'logo' => 'https://via.placeholder.com/100', 'jobs' => 80, 'location' => 'San Francisco'],
        ['name' => 'AI Pioneers', 'logo' => 'https://via.placeholder.com/100', 'jobs' => 70, 'location' => 'Tokyo'],
    ];
    return view('companies', compact('companies'));
})->name('companies');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/category/{category}', function ($category) {
    $categories = [
        'web-development' => [
            'title' => 'Web Development',
            'jobs' => [
                ['title' => 'Senior Laravel Developer', 'company' => 'Tech Corp', 'location' => 'Remote', 'salary' => '$80k - $120k'],
                ['title' => 'Frontend Developer (React)', 'company' => 'Code Masters', 'location' => 'New York', 'salary' => '$70k - $100k'],
                ['title' => 'Full Stack Developer', 'company' => 'Dev Solutions', 'location' => 'Berlin', 'salary' => '$90k - $130k'],
            ],
        ],
        'mobile-development' => [
            'title' => 'Mobile Development',
            'jobs' => [
                ['title' => 'iOS Developer (Swift)', 'company' => 'App Innovators', 'location' => 'San Francisco', 'salary' => '$85k - $110k'],
                ['title' => 'Android Developer (Kotlin)', 'company' => 'Mobile Experts', 'location' => 'London', 'salary' => '$75k - $100k'],
                ['title' => 'Flutter Developer', 'company' => 'Cross Platform Pros', 'location' => 'Remote', 'salary' => '$70k - $95k'],
            ],
        ],
        'data-science' => [
            'title' => 'Data Science',
            'jobs' => [
                ['title' => 'Data Scientist (Python)', 'company' => 'Data Wizards', 'location' => 'Remote', 'salary' => '$90k - $120k'],
                ['title' => 'Machine Learning Engineer', 'company' => 'AI Pioneers', 'location' => 'Tokyo', 'salary' => '$100k - $140k'],
                ['title' => 'Data Analyst', 'company' => 'Insightful Analytics', 'location' => 'New York', 'salary' => '$70k - $90k'],
            ],
        ],
        'ui-ux-design' => [
            'title' => 'UI/UX Design',
            'jobs' => [
                ['title' => 'UI/UX Designer', 'company' => 'Design Studio', 'location' => 'Remote', 'salary' => '$65k - $85k'],
                ['title' => 'Product Designer', 'company' => 'Innovative Solutions', 'location' => 'San Francisco', 'salary' => '$80k - $110k'],
                ['title' => 'UX Researcher', 'company' => 'User Insights', 'location' => 'Berlin', 'salary' => '$70k - $95k'],
            ],
        ],
        'devops' => [
            'title' => 'DevOps',
            'jobs' => [
                ['title' => 'DevOps Engineer', 'company' => 'Cloud Experts', 'location' => 'Remote', 'salary' => '$90k - $120k'],
                ['title' => 'Site Reliability Engineer', 'company' => 'Tech Corp', 'location' => 'New York', 'salary' => '$100k - $130k'],
                ['title' => 'Cloud Architect', 'company' => 'Infra Masters', 'location' => 'London', 'salary' => '$110k - $140k'],
            ],
        ],
        'cybersecurity' => [
            'title' => 'Cybersecurity',
            'jobs' => [
                ['title' => 'Security Engineer', 'company' => 'Secure Systems', 'location' => 'Remote', 'salary' => '$85k - $110k'],
                ['title' => 'Penetration Tester', 'company' => 'Hackproof', 'location' => 'San Francisco', 'salary' => '$90k - $120k'],
                ['title' => 'Cybersecurity Analyst', 'company' => 'Data Shield', 'location' => 'Berlin', 'salary' => '$75k - $95k'],
            ],
        ],
    ];

    if (!array_key_exists($category, $categories)) {
        abort(404); // Ако категорията не съществува, връщаме 404
    }

    return view('category', [
        'category' => $categories[$category]['title'],
        'jobs' => $categories[$category]['jobs'],
    ]);
})->name('category');


require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
