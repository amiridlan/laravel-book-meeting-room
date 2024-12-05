<x-layout>
    @section('title', 'Create New Job')

    <x-slot:heading>
        Create New Job
    </x-slot:heading>

    <form method="POST" action="/jobs">
        @csrf {{-- create a hidden unique token for session. --}}

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Create New Job</h2>
                <p class="mt-1 text-sm/6 text-gray-600">Fill in the details.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="title"> Title </x-form-label>
                        <div class="mt-2">
                            <x-form-input name="title" id="title" placeholder="Manager"></x-form-input>
                            <x-form-error name="title"></x-form-error>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="salary"> Salary </x-form-label>
                        <div class="mt-2">
                            <x-form-input name="salary" id="salary" placeholder="RM 100,000"></x-form-input>
                            <x-form-error name="salary"></x-form-error>
                        </div>
                    </x-form-field>
                </div>
            </div>

            {{-- Cancel & Save button --}}
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
                <x-form-button>Save</x-form-button>
            </div>
    </form>

</x-layout>
