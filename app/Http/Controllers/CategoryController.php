<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class CategoryController extends Controller
{
    public function show($slug)
    {
        // Вземи обявите за съответната категория
        $jobs = Job::where('category', $slug)->get();

        // Връщане на view със списък на обявите
        return view('category', [
            'category' => $slug,
            'jobs' => $jobs,
        ]);
    }
}
