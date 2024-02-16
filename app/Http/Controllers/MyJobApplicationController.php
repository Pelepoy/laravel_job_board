<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\User;
use Illuminate\Http\Request;

class MyJobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {

        return view(
            'my_job_applications.index',
            [
                'applications' => auth()->user()->jobApplications()
                    ->with([
                        'job' => fn ($query) => $query->withCount('jobApplications')
                            ->withAvg('jobApplications', 'expected_salary'),
                        'job.employer'
                    ])
                    ->latest()->get()
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobApplication $myJobApplication)
    {
        // dd($myJobApplication);
        $myJobApplication->delete();

        return redirect()->back()
            ->with('success', 'Job application deleted successfully.');
    }
}
