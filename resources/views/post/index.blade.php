@extends('layouts.app')

@section('content')

<style>
    .header {
        font-size: 30px;
        font-weight: bold;
        color: #750000;
        /* Maroon */
        margin: 20px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="text-left">
                    <h1 class="header">Posts List</h1>
                </div>
                <a href="{{ route('post.create') }}" class="btn ms-2" style="background-color: #750000; color: white;">Add Post</a>
            </div>
                
            <div class="card-body">
                <div class="row">
                    @foreach ($posts as $post)
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <img src="{{ asset('images/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}" style="height: 150px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">
                                    <strong>Start Date:</strong> {{ $post->start_date }}<br>
                                    <strong>End Date:</strong> {{ $post->end_date }}
                                </p>
                                <br>

                                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-success btn-sm">Edit</a>
                                <a href="{{ route('post.show', $post->id) }}" class="btn btn-success btn-sm">Show</a>
                                <form action="{{ route('post.destroy', $post->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
