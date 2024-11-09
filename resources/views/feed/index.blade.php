

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Program Feed') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Display each program in a loop -->
                    @foreach($feeds as $feeds)
                        <div class="mb-4 border-b border-gray-200 pb-4">
                            <h3 class="text-lg font-semibold">{{ $feeds->title }}</h3>
                            <p><strong>Location:</strong> {{ $feeds->location }}</p>
                            <p><strong>Start Date:</strong> {{ $feeds->start_date }}</p>
                            <p><strong>End Date:</strong> {{ $feeds->end_date }}</p>
                            <p><strong>Benefits:</strong> {{ $feeds->benefits }}</p>
                            <p>{{ $feeds->description }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
