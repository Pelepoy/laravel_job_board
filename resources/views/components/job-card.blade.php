<x-card class="mb-4">
    <div class="mb-4 flex justify-between">
        <h1 class="text-lg font-medium"> {{ $job->title }}</h1>
        <h1 class="text-slate-500"> <span class="font-semibold">₱</span>{{ number_format($job->salary) }} </h1>
    </div>
    <div class="flex mb-4 justify-between text-slate-500 text-sm items-center">
        <div class="flex space-x-4">
            <div>Company Name</div>
            <div> {{ $job->location }} </div>
        </div>
        <div class="flex space-x-1 text-xs">
            <x-tag>{{ $job->experience }}</x-tag>
            <x-tag>{{ $job->category }}</x-tag>
        </div>
    </div>
    <p class="text-justify text-sm mb-4">
        {!! nl2br(e($job->description)) !!}
    </p>

    {{ $slot }}
</x-card>