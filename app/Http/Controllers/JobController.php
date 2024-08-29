<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\JobPosted;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->simplePaginate(5);

        // return response()->json($jobs);

        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    public function create()
    {
        // return redirect()->action([JobController::class, 'edit'], [6]);
        return view('jobs.create');
    }

    public function show(Job $job)
    {
        // $findJob = Job::with('employer')->find($job);
        // return response()->json($findJob);

        return view('jobs.show', ['job' => $job]);
    }

    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);
    
        $job = Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1
        ]);

        Mail::to($job->employer->user)->queue(
            new JobPosted($job)
        );
    
        return redirect('/jobs');
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job)
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);
    
        $job->update([
            'title' => request('title'),
            'salary' => request('salary')
        ]);
    
        return redirect('/jobs/' . $job->id);
    }

    public function destroy(Job $job)
    {
        $findJob = Job::findorFail($job);

        if (!$findJob) {
            return response()->json(error);
        }

        $findJob->delete();
        // return response()->json(null);

        return redirect('/jobs');
    }
}
