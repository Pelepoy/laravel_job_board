<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create(Job $job)
    {
        $this->authorize('apply', $job);
        return view('job_application.create', ['job' => $job]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Job $job, Request $request)
    {

        // $validated = $request->validate([
        //     'expected_salary' => 'required|min:1|max:1000000'
        // ]);

        // $job->jobApplications()->create([
        //     'user_id' => auth()->id(),
        //     ...$validated
        // ]);

        $job->jobApplications()->create([
            'user_id' => auth()->id(),
            ...$request->validate([
                'expected_salary' => 'required|integer|min:1|max:1000000'
            ])
        ]);

        return redirect()->route('jobs.show', $job)
            ->with('success', 'Jop application submitted!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
