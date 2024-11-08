<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-center align-items-center w-full">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight me-3">
                {{ __('Dashboard') }}
            </h2>
            <form method="GET" action="{{ route('dashboard.search') }}" class="d-flex">
                <input type="text" name="query" class="form-control" placeholder="Enter search term..." value="{{ request('query') }}">
                <button type="submit" class="btn btn-primary ms-2">
                    <i class="fas fa-search"></i> <!-- Font Awesome Search Icon -->
                </button>
            </form>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    @if(isset($results))
                        <h3>Search Results:</h3>
                        <ul>
                            @foreach($results as $result)
                                <li>{{ $result->title }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
