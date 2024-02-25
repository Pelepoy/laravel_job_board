<x-layout>
    <x-breadcrumbs :links="['My Jobs' => route('my-jobs.index')]" class="mb-4" />
    <div class="mb-8 text-right">
        <x-link-button href="{{ route('my-jobs.create') }}">
            Create Job
        </x-link-button>
    </div>

    @forelse ($jobs as $job)
        <x-job-card :job="$job">
            <div class="text-xs text-slate-500">
                @forelse ($job->jobApplications as $application)
                    <div class="mb-4 flex justify-between items-center">
                        <div>
                            <div> {{ $application->user->name }} </div>
                            <div> Applied {{ $application->created_at->diffForHumans() }}</div>
                            {{-- <div>Average Expected Salary: {{ number_format($application->avg('expected_salary')) }}</div> --}}
                            <div>Download CV</div>
                        </div>
                        <div>
                            <div> Expected Salary: ₱{{ number_format($application->expected_salary) }}</div>
                        </div>
                    @empty
                        <div class="text-xs text-slate-500">No Application Yet</div>
                @endforelse
            </div>
            <div class="flex space-x-2 mt-3">
                <x-link-button href="{{ route('my-jobs.edit', $job) }}"> Edit </x-link-button>
            </div>
        </x-job-card>
    @empty
        <div class="rounded-md border border-dashed border-slate-400 py-8">
            <h1 class="text-center text-slate-500"> You have not created any jobs yet.
                <a href="{{ route('my-jobs.create') }}" class="text-indigo-500 hover:underline">Create one now!</a>
            </h1>
        </div>
    @endforelse
</x-layout>
