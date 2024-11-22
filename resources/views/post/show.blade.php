<!-- resources/views/post/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{ $post->title }}</div>

            <div class="card-body">
                <p><strong>Location:</strong> {{ $post->location }}</p>
                <p><strong>Start Date:</strong> {{ $post->start_date }}</p>
                <p><strong>End Date:</strong> {{ $post->end_date }}</p>
                <p><strong>Start Time:</strong> {{ $post->start_time }}</p>
                <p><strong>End Time:</strong> {{ $post->end_time }}</p>
                <p><strong>Benefits:</strong> {{ $post->benefits }}</p>
                <p><strong>Description:</strong> {{ $post->description }}</p>
                @if($post->image)
                            <div class="mb-3">
                                <img src="{{ asset('images/' . $post->image) }}" alt="Post Image" class="img-fluid" style="max-width: 100%; height: auto;">
                            </div>
                        @else
                            <p>No image available for this post.</p>
                        @endif
            </div>
        </div>
    </div>
@endsection
