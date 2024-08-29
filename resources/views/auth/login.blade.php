<x-layout>
    <x-slot:heading>
        Log In
    </x-slot:heading>

    <form method="POST" action="/login">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <p class="mt-1 text-sm leading-6 text-gray-600">* All fields are required.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <x-form-label for="email">Email *</x-form-label>
                        
                        <div class="mt-2">
                            <x-form-input
                                type="email"
                                name="email"
                                id="email"
                                value="{{ old('email') }}"
                                required />
                        </div>

                        <x-form-error name="email" />
                    </div>

                    <div class="sm:col-span-3">
                        <x-form-label for="password">Password *</x-form-label>

                        <div class="mt-2">
                            <x-form-input
                                type="password"
                                name="password"
                                id="password"
                                required />
                        </div>

                        <x-form-error name="password" />
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <x-form-button>Log In</x-form-button>
        </div>
    </form>
</x-layout>