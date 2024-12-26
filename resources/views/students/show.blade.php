@extends('layouts.app')

@section('content')
<div class="container mt-4" style="font-family: 'Poppins', sans-serif;">
    <!-- Header Section -->
    <div class="cover-photo" style="position: relative; height: 300px; background: url('{{ $student->header_image ? asset('storage/' . $student->header_image) : asset('default-cover.jpg') }}') no-repeat center center / cover;">
        <!-- Profile Picture -->
        <div class="profile-picture" style="position: absolute; bottom: -75px; left: 20px;">
            <img 
                src="{{ $student->profile_image ? asset('storage/' . $student->profile_image) : asset('default-profile.png') }}" 
                alt="Profile Image" 
                class="rounded-circle border border-white shadow" 
                style="width: 150px; height: 150px; object-fit: cover;"
            >
        </div>
    </div>

    <!-- Student Info Section -->
    <div class="d-flex align-items-center mt-5" style="margin-left: 180px;"> <!-- Adjust margin-top value here -->
        <!-- Student Name and Info Beside Profile Picture -->
        <div style="margin-top: -50px;">
            <h1 class="fw-bold" style="font-size: 1.8rem; margin-top: 0.3rem;">{{ $student->name }}</h1>
            <p class="text-muted" style="margin: 0; font-size: 0.9rem;">
                {{ $student->university ? 'University: ' . $student->university : 'University not provided' }}
            </p>
        </div>
    </div>
    
    <!-- Additional Info Section -->
    <div class="card mt-4">
        <div class="card-body">
            <p><strong>Faculty:</strong> {{ $student->faculty }}</p>
            <p><strong>Languages:</strong> {{ $student->languages }}</p>
            <p><strong>Location:</strong> {{ $student->location }}</p>
            <p><strong>Experience:</strong> {{ $student->experience }}</p>
        </div>
    </div>
</div>
@endsection
