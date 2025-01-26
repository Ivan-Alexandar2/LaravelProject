<?php
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

// Начална страница
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Маршрути за обявите за работа
Route::resource('jobs', JobController::class);

// Страница за всички обяви
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

// Страница за компаниите
Route::get('/companies', function () {
    $companies = [
        ['name' => 'Tech Corp', 'logo' => 'images/companies/TechCorp.png', 'jobs' => 200, 'location' => 'Remote'],
        ['name' => 'Dev Solutions', 'logo' => 'images/companies/devSolutions.jpg', 'jobs' => 150, 'location' => 'New York'],
        ['name' => 'Code Masters', 'logo' => 'images/companies/codemasters.JPG', 'jobs' => 120, 'location' => 'London'],
        ['name' => 'Data Innovators', 'logo' => 'images/companies/dataInnovators.jpg', 'jobs' => 90, 'location' => 'Berlin'],
        ['name' => 'Cloud Experts', 'logo' => 'images/companies/cloudExperts.jpg', 'jobs' => 80, 'location' => 'San Francisco'],
        ['name' => 'AI Pioneers', 'logo' => 'images/companies/AIPioneers.png', 'jobs' => 70, 'location' => 'Tokyo'],
    ];
    return view('companies', compact('companies'));
})->name('companies');

// Маршрут за категориите (актуализиран)
Route::get('/category/{category}', function ($category) {
    $jobs = Job::where('category', $category)->get(); // Вземи обявите за работа от базата данни
    return view('category', [
        'category' => $category,
        'jobs' => $jobs,
    ]);
})->name('category');

// Маршрут за формата за кандидатстване
Route::get('/apply/{job}', [ApplicationController::class, 'showApplicationForm'])->name('apply.form');

// Маршрут за обработка на формата за кандидатстване
Route::post('/apply/{job}', [ApplicationController::class, 'submitApplication'])->name('apply.submit');
Route::post('/apply/{jobId}', [ApplicationController::class, 'submitApplication'])->name('apply.submit');

// Dashboard маршрути (за аутентикирани потребители)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Маршрути за автентикация (вход, регистрация и т.н.)
require __DIR__.'/auth.php';