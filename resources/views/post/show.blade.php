@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <!-- Left column for image -->
                <div class="col-md-4 text-center"> 
                    @if($post->image)
                        <img src="{{ asset('images/' . $post->image) }}" alt="Post Image" class="img-fluid" style="width: 100%; height: auto;">
                    @else
                        <p class="text-muted">No image available for this post.</p>
                    @endif
                </div>

                <!-- Right column for title, organizer, and other details -->
                <div class="col-md-8">
                    <div class="post-header">
                        <h2 class="mb-1" style="font-size: 1.8rem; color: #750000; font-family: 'Poppins', sans-serif;">
                            <strong>{{ $post->title }}</strong>
                        </h2>
                        <p class="mb-1 fw400 fz90" style="font-family: 'Poppins', sans-serif;">
                            By : <a href="{{ route('organizer.show', $post->organizer->id) }}" style="text-decoration: underline; color: inherit;">
                                {{$post->organizer->name}}
                            </a>
                        </p>
                    </div>

                    <div class="post-details mt-3" style="font-family: 'Poppins', sans-serif;">
                        <div class="mb-3">
                            <p><strong>Location:</strong> {{ $post->location ?: 'None' }}</p>
                            <p><strong>Start Date:</strong> {{ \Carbon\Carbon::parse($post->start_date)->format('F j, Y') }}</p>
                            <p><strong>End Date:</strong> {{ \Carbon\Carbon::parse($post->end_date)->format('F j, Y') }}</p>
                            <p><strong>Start Time:</strong> {{ \Carbon\Carbon::parse($post->start_time)->format('g:i A') }}</p>
                            <p><strong>End Time:</strong> {{ \Carbon\Carbon::parse($post->end_time)->format('g:i A') }}</p>
                        </div>

                        <div class="mb-3">
                            <p><strong>Benefits:</strong></p>
                            <p>{{ $post->benefits ?: 'None' }}</p>
                        </div>

                        <div>
                            <p><strong>Description:</strong></p>
                            <p>{{ $post->description ?: 'None' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
