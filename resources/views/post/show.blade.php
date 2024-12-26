@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mb-4">
        <div class="card-header">
            <h2 class="mb-0"><strong>{{ $post->title }} </strong> </h2> 
                <p  class="mb-1 fw400 fz90">
                    By : <a href="{{ route('organizer.show', $post->organizer->id) }}" style="text-decoration: underline; color: inherit;">
                        {{$post->organizer->name}}
                    </a>
                </p>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-8"> <!-- Left column for details -->
                    <div class="post-details">
                        <div class="mb-3">
                            <p><strong>Location:</strong> {{ $post->location }}</p>
                            <p><strong>Start Date:</strong> {{ \Carbon\Carbon::parse($post->start_date)->format('F j, Y') }}</p>
                            <p><strong>End Date:</strong> {{ \Carbon\Carbon::parse($post->end_date)->format('F j, Y') }}</p>
                            <p><strong>Start Time:</strong> {{ \Carbon\Carbon::parse($post->start_time)->format('g:i A') }}</p>
                            <p><strong>End Time:</strong> {{ \Carbon\Carbon::parse($post->end_time)->format('g:i A') }}</p>
                        </div>

                        <div class="mb-3">
                            <p><strong>Benefits:</strong></p>
                            <p>{{ $post->benefits }}</p>
                        </div>

                        <div>
                            <p><strong>Description:</strong></p>
                            <p>{{ $post->description }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 text-center"> <!-- Right column for image -->
                    @if($post->image)
                        <img src="{{ asset('images/' . $post->image) }}" alt="Post Image" class="img-fluid" style="max-width: 100%; height: auto;">
                    @else
                        <p class="text-muted">No image available for this post.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
@endsection