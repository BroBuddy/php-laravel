<x-layout>
    <x-slot:heading>
        Edit job: {{ $job->title }}
    </x-slot:heading>

    <form method="POST" action="/jobs/{{ $job->id }}">
        @csrf
        @method('PATCH')

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <p class="mt-1 text-sm leading-6 text-gray-600">* All fields are required.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <x-form-label for="title">Title *</x-form-label>
        
                        <div class="mt-2">
                            <x-form-input
                                name="title"
                                id="title"
                                value="{{ $job->title }}"
                                required />
                        </div>

                        <x-form-error name="title" />
                    </div>

                    <div class="sm:col-span-3">
                        <x-form-label for="salary">Salary *</x-form-label>
        
                        <div class="mt-2">
                            <x-form-input
                                name="salary"
                                id="salary"
                                value="{{ $job->salary }}"
                                required />
                        </div>

                        <x-form-error name="salary" />
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex justify-between gap-x-6">
            <div class="flex items-center justify-start">
                <x-form-button form="delete-form" class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">Delete</x-form-button>
            </div>

            <div class="flex items-center justify-end gap-x-6">
                <a href="/jobs/{{ $job->id }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                <x-form-button>Update</x-form-button>
            </div>
        </div>
    </form>

    <form method="POST" action="/jobs/{{ $job->id }}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</x-layout>