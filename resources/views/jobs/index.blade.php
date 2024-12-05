<x-layout>
    @section('title', 'Job Listings')

    <x-slot:heading>
        Job Listings
    </x-slot:heading>

    <div class="space-y-4 block px-9 ">
        @foreach ($jobs as $job)
            <a href="/jobs/{{ $job['id'] }}" class="block px-5 py-6 border border-yellow-600 rounded-lg">
                <div class="font-bold text-blue-600 text-sm">{{ $job->employer->name }}</div>
                <div>
                    <strong>{{ $job['title'] }}</strong>
                </div>
            </a>
        @endforeach

        <div>
            {{ $jobs->links() }}
        </div>

    </div>
</x-layout>
