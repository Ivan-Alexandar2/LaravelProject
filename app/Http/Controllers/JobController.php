<?php

namespace аpp\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        return view('jobs.index', compact('jobs'));
    }
    public function showApplicationForm($jobId) // ----------------------
    {
    $job = Job::findOrFail($jobId); // Вземи позицията по ID
    return view('apply', compact('job'));
    } // NOVOTO ------------------------------------------
    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'company' => 'required',
            'location' => 'required',
            'salary' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $job = new Job();
        $job->title = $request->title;
        $job->description = $request->description;
        $job->company = $request->company;
        $job->location = $request->location;
        $job->salary = $request->salary;

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images'), $imageName);
            $job->image = $imageName;
        }

        $job->save();

        return redirect()->route('jobs.index')->with('success', 'Обявата е създадена успешно.');
    }

    public function edit($id)
    {
        $job = Job::find($id);
        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'company' => 'required',
            'location' => 'required',
            'salary' => 'required'
        ]);

        $job = Job::find($id);
        $job->title = $request->title;
        $job->description = $request->description;
        $job->company = $request->company;
        $job->location = $request->location;
        $job->salary = $request->salary;

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images'), $imageName);
            $job->image = $imageName;
        }

        $job->save();

        return redirect()->route('jobs.index')->with('success', 'Обявата е обновена успешно.');
    }

    public function destroy($id)
    {
        $job = Job::find($id);
        $job->delete();

        return redirect()->route('jobs.index')->with('success', 'Обявата е изтрита успешно.');
    }
}