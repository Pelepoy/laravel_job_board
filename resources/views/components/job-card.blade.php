<x-card class="mb-4">
    <div class="mb-4 flex justify-between">
        <h1 class="text-lg font-medium"> {{ $job->title }}</h1>
        <h1 class="text-slate-500 font-medium"> <span class="font-semibold">₱</span>{{ number_format($job->salary) }}
        </h1>
    </div>
    <div class="flex mb-4 justify-between text-slate-500 text-sm items-center">
        <div class="flex space-x-4">
            <div> {{$job->employer->company_name}}</div>
            <div> {{ $job->location }} </div>
        </div>
        <div class="flex space-x-1 text-xs">
            <x-tag>
                <a href="{{ route('jobs.index', ['experience' => $job->experience]) }}">
                    {{ Str::ucfirst($job->experience) }}
                </a>
            </x-tag>
            <x-tag>
                <a href="{{ route('jobs.index', ['category' => $job->category]) }}">
                    {{ $job->category }}
                </a>
            </x-tag>
        </div>
    </div>

    {{ $slot }}
</x-card>
