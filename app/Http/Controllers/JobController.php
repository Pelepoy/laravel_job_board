<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Job $job)
    {
        $filters = request()->only(
            'search',
            'min_salary',
            'max_salary',
            'experience',
            'category',
        );

        $jobs = Job::with('employer')->filter($filters)->latest()->get();

        return view('jobs.index', [
            'jobs' => $jobs,
        ]);
    }

    public function show(Job $job)
    {
        return view('jobs.show', [
            'job' => $job->load('employer.jobs')
        ]);
    }
}
