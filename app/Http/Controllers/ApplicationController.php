<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Job; // Ако имаш модел за позициите
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    // Показване на формата за кандидатстване
    public function showApplicationForm($jobId)
    {
        $job = Job::findOrFail($jobId); // Вземи позицията по ID
        //dd($job); // Провери структурата на данните
        return view('apply', compact('job'));
    }
    public function showCategory($category)
    {
        $jobs = Job::where('category', $category)->get();
        dd($jobs); // Провери структурата на данните
        return view('category', compact('jobs'));
    }
    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'motivation_letter' => 'required',
        'job_id' => 'required|exists:job_listings,id',
        //'job_id' => 'required|exists:jobs,id', ---------- vmestoo gornoto
    ]);

    Application::create($validatedData);

    return redirect()->route('some.route')->with('success', 'Application submitted successfully!');
    }

    public function submitApplication(Request $request, $jobId)
    {
        //dd($request->all());
        //dd($jobId);
    // Проверка дали потребителят е влязъл
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'You need to log in to submit an application.');
    }

    // Валидация на данните
    $validatedData = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'motivation_letter' => 'required|string',
        'job_id' => 'required|exists:job_listings,id', // Валидация за job_id
    ]);

    // Запазване на кандидатурата
    $application = Application::create([
        'first_name' => $validatedData['first_name'],
        'last_name' => $validatedData['last_name'],
        'motivation_letter' => $validatedData['motivation_letter'],
        'job_id' => $validatedData['job_id'], // Използвай job_id от валидираните данни
        'user_id' => auth()->id(), // Вземи ID на текущия потребител
    ]);

    // Пренасочване с успешно съобщение
    return redirect()->route('home')->with('success', 'Your application has been submitted successfully!');
    }
}
