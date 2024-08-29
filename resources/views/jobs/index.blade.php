<x-layout>
    <x-slot:heading>
        <div class="float-right">
            <x-button href="/jobs/create">Create Job</x-button>
        </div>

        Jobs available
    </x-slot:heading>

    <ul role="list" class="divide-y divide-gray-100">
        @foreach ($jobs->sortByDesc('id') as $job)
            <li class="flex justify-between gap-x-6 py-5">
                <div class="flex min-w-0 gap-x-4">
                    <a href="/jobs/{{ $job['id'] }}" class="text-blue-500 hover:underline">
                        <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="https://ui-avatars.com/api/?name={{ Str::limit($job->title, 2, 0) }}" alt="">
                    </a>

                    <div class="min-w-0 flex-auto">
                        <p class="font-semibold leading-6 text-gray-900">{{ $job->title }}</p>
                        <p class="mt-1 truncate text-sm leading-5 text-gray-500">{{ $job->employer->name }}</p>
                    </div>
                </div>

                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                    <p class="leading-6 text-gray-900">{{ $job->salary }}€</p>
                    <p class="mt-1 text-sm leading-5 text-gray-500">{{ $job->created_at->format('j F, Y') }}</p>
                </div>
            </li>
        @endforeach
    </ul>

    <div>
        {{ $jobs->links() }}
    </div>
</x-layout>