@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Student Profile</h1>
    <div class="card">
        <div class="card-header">
            <h2>{{ $student->name }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Email:</strong> {{ $student->email }}</p>
            <p><strong>University:</strong> {{ $student->university }}</p>
            <p><strong>Faculty:</strong> {{ $student->faculty }}</p>
            <p><strong>Languages:</strong> {{ $student->languages }}</p>
            <p><strong>Location:</strong> {{ $student->location }}</p>
            <p><strong>Experience:</strong> {{ $student->experience }}</p>
            <p><strong>Profile Image:</strong></p>
            <img src="{{ asset('storage/' . $student->profile_image) }}" alt="Profile Image" class="rounded-circle" style="width: 150px; height: 150px;">
        </div>
    </div>
</div>
@endsection
