@extends('layouts.app')

@section('content')
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4> Edit Post 
                                <a href="{{ url('post') }}" class = "btn btn-danger float-end">Back</a>
                            </h4>
                        </div>
                        <div class="card-body">
                                <!-- Form to create a new post -->
                                <form action="{{ route('post.update', $post->id) }}" method="POST"enctype="multipart/form-data"> 
                                    @csrf
                                    @method('PUT')

                                    <!-- Title -->
                                    <div class="mb-4">
                                        <label for="title" class="block font-medium text-sm text-gray-700">Title</label>
                                        <input type="text" name="title" id="title" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $post->title }}" required>
                                        @error('title')
                                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                    @enderror
                                    </div>

                                    <!-- Location -->
                                    <div class="mb-4">
                                        <label for="location" class="block font-medium text-sm text-gray-700">Location</label>
                                        <input type="text" name="location" id="location" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $post->location }}">
                                        @error('location')
                                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Start Date -->
                                    <div class="mb-4">
                                        <label for="start_date" class="block font-medium text-sm text-gray-700">Start Date</label>
                                        <input type="date" name="start_date" id="start_date" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $post->start_date }}" required>
                                        @error('start_date')
                                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- End Date -->
                                    <div class="mb-4">
                                        <label for="end_date" class="block font-medium text-sm text-gray-700">End Date</label>
                                        <input type="date" name="end_date" id="end_date" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $post->end_date }}">
                                        @error('end_date')
                                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Start Time -->
                                    <div class="mb-4">
                                        <label for="start_time" class="block font-medium text-sm text-gray-700">Start Time</label>
                                        <input type="time" name="start_time" id="start_time" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $post->start_time }}">
                                        @error('start_time')
                                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- End Time -->
                                    <div class="mb-4">
                                        <label for="end_time" class="block font-medium text-sm text-gray-700">End Time</label>
                                        <input type="time" name="end_time" id="end_time" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $post->end_time }}">
                                        @error('end_time')
                                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Benefits -->
                                    <div class="mb-4">
                                        <label for="benefits" class="block font-medium text-sm text-gray-700">Benefits</label>
                                        <input type="text" name="benefits" id="benefits" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $post->benefits }}">
                                        @error('benefits')
                                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Description -->
                                    <div class="mb-4">
                                        <label for="description" class="block font-medium text-sm text-gray-700">Description</label>
                                        <textarea name="description" id="description" rows="5" 
                                                class="form-input rounded-md shadow-sm mt-1 block w-full @error('description') border-red-500 @enderror">
                                            {{ old('description', $post->description ?? '') }}
                                        </textarea>
                                        
                                        <!-- Error Message -->
                                        @error('description')
                                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                        @if ($post->image)
                                            <p>Current Image:</p>
                                            <img src="{{ asset('images/' . $post->image) }}" alt="Current Image" style="max-width: 200px; height: auto;">
                                        @endif
                                    </div>
                                    
                                    <!-- Submit Button -->
                                    <div class="flex items-center justify-end mt-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Edit  Post') }}
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
