<x-layout>
    <x-breadcrumbs class="mb-4" 
    :links="['Jobs' => route('jobs.index'), $job->title => '#']" 
    />
    <x-job-card :job="$job"> 
        <p class="text-justify text-sm mb-4">
            {!! nl2br(e($job->description)) !!}
        </p>
    </x-job-card>
</x-layout>
