@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->description }}</p>
    <p>Location: {{ $post->location }}</p>
    <p>Start Date: {{ $post->start_date }}</p>
    <p>End Date: {{ $post->end_date }}</p>

    <!-- Quick Apply Button -->
    <form method="POST" action="{{ route('feed.quickApply', $post->id) }}">
        @csrf
        <button type="submit">Quick Apply</button>
    </form>
</div>
@endsection
