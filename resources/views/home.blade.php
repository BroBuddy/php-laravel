<x-layout>
    <x-slot:heading>
        Employers overview
    </x-slot:heading>

    <ul role="list" class="divide-y divide-gray-100">
        @foreach ($employers->sortBy('name') as $employer)
            <li class="flex justify-between gap-x-6 py-5">
                <div class="flex min-w-0 gap-x-4">
                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="https://ui-avatars.com/api/?name={{ Str::limit($employer->name, 2, 0) }}" alt="">

                    <div class="min-w-0 flex-auto">
                        <p class="font-semibold leading-6 text-gray-900">{{ $employer->name }}</p>
                        <p class="mt-1 truncate text-sm leading-5 text-gray-500">Has {{ $employer->jobs->count() }} job(s).</p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>

    <div>
        {{ $employers->links() }}
    </div>
</x-layout>