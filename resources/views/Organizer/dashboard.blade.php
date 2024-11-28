<x-app-layout>
    <x-slot name="header">
        <div class="d-flex align-items-center w-full">
            <!-- Organizer Dashboard Title -->
            <h2 class="font-semibold text-xl text-gray-800 leading-tight me-5">
                {{ __('Organizer Dashboard') }}
            </h2>
            
            <!-- Search Form -->
            <form method="GET" action="{{ route('dashboard.search') }}" class="d-flex">
                <input type="text" name="query" class="form-control" placeholder="Enter search term..." value="{{ request('query') }}">
                <!-- Button with search icon -->
                <button type="submit" class="btn ms-2" style="background-color: #750000; color: white;">
                    <i class="fas fa-search"></i> <!-- FontAwesome search icon -->
                </button>
            </form>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
