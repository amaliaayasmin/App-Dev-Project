<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                <!-- Form to create a new post -->
                <form action="{{ route('post.store') }}" method="POST">
                    @csrf

                    <!-- Title -->
                    <div class="mb-4">
                        <label for="title" class="block font-medium text-sm text-gray-700">Title</label>
                        <input type="text" name="title" id="title" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('title') }}" required>
                        @error('title')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Location -->
                    <div class="mb-4">
                        <label for="location" class="block font-medium text-sm text-gray-700">Location</label>
                        <input type="text" name="location" id="location" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('location') }}">
                        @error('location')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Start Date -->
                    <div class="mb-4">
                        <label for="start_date" class="block font-medium text-sm text-gray-700">Start Date</label>
                        <input type="date" name="start_date" id="start_date" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('start_date') }}" required>
                        @error('start_date')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- End Date -->
                    <div class="mb-4">
                        <label for="end_date" class="block font-medium text-sm text-gray-700">End Date</label>
                        <input type="date" name="end_date" id="end_date" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('end_date') }}">
                        @error('end_date')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Start Time -->
                    <div class="mb-4">
                        <label for="start_time" class="block font-medium text-sm text-gray-700">Start Time</label>
                        <input type="time" name="start_time" id="start_time" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('start_time') }}">
                        @error('start_time')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- End Time -->
                    <div class="mb-4">
                        <label for="end_time" class="block font-medium text-sm text-gray-700">End Time</label>
                        <input type="time" name="end_time" id="end_time" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('end_time') }}">
                        @error('end_time')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Benefits -->
                    <div class="mb-4">
                        <label for="benefits" class="block font-medium text-sm text-gray-700">Benefits</label>
                        <input type="text" name="benefits" id="benefits" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('benefits') }}">
                        @error('benefits')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label for="description" class="block font-medium text-sm text-gray-700">Description</label>
                        <textarea name="description" id="description" rows="5" class="form-input rounded-md shadow-sm mt-1 block w-full">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Create Post') }}
                        </button>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
