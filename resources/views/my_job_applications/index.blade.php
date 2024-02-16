<x-layout>
    <x-breadcrumbs class="mb-8" :links="['My Job Applications' => '#']" />

    @forelse ($applications as $application)
        <x-job-card :job="$application->job">
            <div class="flex items-center justify-between text-xs text-slate-400">
                <div>
                    <div>
                        Applied: {{ $application->created_at->diffForHumans() }}
                    </div>
                    <div>
                        Other {{ Str::plural('applicant', $application->job->job_applications_count - 1) }}:
                        {{ $application->job->job_applications_count - 1 }}
                    </div>
                    <div>
                        Expected salary: ₱{{ number_format($application->expected_salary) }}
                    </div>
                    <div>
                        Average asking salary:
                        ₱{{ number_format($application->job->job_applications_avg_expected_salary) }}
                    </div>
                </div>
                <div>
                    <form action="{{ route('my-job-application.destroy', $application) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-button>Cancel</x-button>
                    </form>
                </div>
            </div>
        </x-job-card>
    @empty
        <div class="rounded-md border border-dashed border-slate-400 py-8">
            <h1 class="text-center text-slate-500">You have not applied in any jobs yet. <a
                    href="{{ route('jobs.index') }}" class="text-indigo-500 hover:underline">Apply here!</a></h1>
        </div>
    @endforelse
</x-layout>
