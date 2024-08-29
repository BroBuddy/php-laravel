<x-layout>
    <x-slot:heading>
        Profile
    </x-slot:heading>

    <form method="POST" action="/profile">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Information</h2>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <x-form-label for="first_name">First name *</x-form-label>
    
                        <div class="mt-2">
                            <x-form-input
                                name="first_name"
                                id="first_name"
                                value="{{ $user->first_name }}"
                                required />
                        </div>

                        <x-form-error name="first_name" />
                    </div>

                    <div class="sm:col-span-3">
                        <x-form-label for="last_name">Last name *</x-form-label>
                        
                        <div class="mt-2">
                            <x-form-input
                                name="last_name"
                                id="last_name"
                                value="{{ $user->last_name }}"
                                required />
                        </div>

                        <x-form-error name="last_name" />
                    </div>

                    <div class="sm:col-span-4">
                        <x-form-label for="email">Email address *</x-form-label>
                        
                        <div class="mt-2">
                            <x-form-input
                                name="email"
                                id="email"
                                value="{{ $user->email }}"
                                required />
                        </div>

                        <x-form-error name="email" />
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/profile" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <x-form-button>Save</x-form-button>
        </div>
    </form>
</x-layout>