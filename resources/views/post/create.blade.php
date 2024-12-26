@extends('layouts.app')

@section('content')
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-between mb-4">
                        <h4 class="font-weight-bold" style="font-size: 30px; color: #750000; margin-left: 30px;"><b>Create Post</b></h4>
                        <a href="{{ url('post') }}" class="btn" style="background-color: #750000; color: white;">Back</a>
                    </div>
                    <div class="card">
                        <div class="card-body">
                                <!-- Form to create a new post -->
                                <form action="{{url('post')}}" method="POST" enctype="multipart/form-data">
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

                                    <div class="mb-4">
                                    <label>Upload File/Image</label>
                                    <input type="file" name="image" class="form-control" />
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="flex items-center justify-end mt-4">
                                        <button type="submit" class="btn" style="background-color: #750000; color: white;">
                                            {{ __('Create Post') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
