
@extends('layouts.app')

@section('content')

<style>
    .header {
        font-size: 30px;
        font-weight: bold;
        color: #750000; /* Maroon */
        margin: 20px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h1 class="header">Your Posts</h1>
                <a href="{{ route('post.create') }}" class="btn ms-2" style="background-color: #750000; color: white;">Add Post</a>
            </div>
                
            <div class="card-body">
                <div class="row">
                    @if ($posts->isEmpty())
                        <p>You have not created any posts yet.</p>
                    @else
                        @foreach ($posts as $post)
                            <div class="col-md-4">
                                <div class="card mb-3">
                                    <img src="{{ asset('images/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}" style="height: 150px; object-fit: cover; ">
                                    <div class="card-body">
                                        <h5 class="card-title"><strong>{{ $post->title }}</strong></h5>
                                        <p class="card-text">
                                            <strong>Start Date:</strong> {{ $post->start_date }}<br>
                                            <strong>End Date:</strong> {{ $post->end_date }}
                                        </p>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-success btn-sm">Edit</a>
                                                <a href="{{ route('post.show', $post->id) }}" class="btn btn-info btn-sm">Show</a>
                                                <a href="{{ route('post.applicants', $post->id) }}" class="btn btn-warning btn-sm">See Applicants</a>

                                            </div>
                                            <form action="{{ route('post.destroy', $post->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    @endif
                        
                </div>
            </div>
           
        </div>
    </div>
</div>

@endsection
