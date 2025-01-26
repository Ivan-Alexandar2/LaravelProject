<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class CategoryController extends Controller
{
    public function show($category)
    {
        $jobs = Job::where('category', $category)->get();
        return view('category', [
            'category' => $category,
            'jobs' => $jobs,
        ]);
    }
}
