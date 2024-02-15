<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('jobs.index'), $job->title => route('jobs.show', $job), 'Apply' => '#']" />

    <x-job-card :job="$job" />

    <x-card>
        <h2 class="mb-4 text-lg font-medium"> Apply for this job? </h2>
        <form action="{{ route('job.application.store', $job) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="expected_salary" class="mb-2 block text-sm font-medium text-slate-500">Expected Salary</label>
                <x-text-input type="number" name="expected_salary" class=""/>
            </div>
            <x-button class="w-full">
                APPLY
            </x-button>
        </form>
    </x-card>
</x-layout>
