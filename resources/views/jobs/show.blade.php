<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('jobs.index'), $job->title => '#']" />
    <x-job-card :job="$job">
        <p class="text-justify text-sm mb-4">
            {!! nl2br(e($job->description)) !!}
        </p>
        @can('apply', $job)
            <x-link-button :href="route('job.application.create', $job)">
                Apply
            </x-link-button>
        @else
            <div class="text-sm text-center text-slate-500 font-medium">
                You have already applied to this job.
            </div>
        @endcan
    </x-job-card>
    <x-card class="mb-4">
        <h2 class="mb-4 text-lg font-medium">
            More {{ $job->employer->company_name }} Jobs you may interested in.
        </h2>
        <div class="text-sm text-slate-500">
            @foreach ($job->employer->jobs as $otherJob)
                <div class="flex justify-between mb-4">
                    <div>
                        <diV class="text-slate-500 font-medium hover:text-blue-500">
                            <a href="{{ route('jobs.show', $otherJob) }}">
                                {{ $otherJob->title }}
                            </a>
                        </div>
                        <div class="text-xs text-slate-400">
                            {{ $otherJob->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <div class="text-xs">
                        ₱{{ number_format($otherJob->salary) }}
                    </div>
                </div>
            @endforeach
        </div>
    </x-card>

</x-layout>
