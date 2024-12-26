@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <!-- Header Section -->
    <div class="cover-photo" style="position: relative; height: 300px; background: url('{{ $organizer->header_image ? asset('storage/' . $organizer->header_image) : asset('default-cover.jpg') }}') no-repeat center center / cover;">
        <!-- Profile Picture -->
        <div class="profile-picture" style="position: absolute; bottom: -60px; left: 20px;">
            <img 
                src="{{ $organizer->profile_image ? asset('storage/' . $organizer->profile_image) : asset('default-profile.png') }}" 
                alt="Profile Image" 
                class="rounded-circle border border-white" 
                style="width: 120px; height: 120px; object-fit: cover;"
            >
        </div>
    </div>

    <!-- Organizer Info Section -->
    <div class="card mt-5">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <h1><strong>{{ $organizer->name }}</strong></h> 
                <p class="text-muted">{{ $organizer->year_established ? 'Established in ' . $organizer->year_established : 'Year established not provided' }}</p>
            </div>
        </div>
        <div class="card-body">
            @if ($organizer->description)
                <p><strong>Description:</strong> {{ $organizer->description }}</p>
            @else
                <p class="text-muted">No description available.</p>
            @endif
        </div>
    </div>
</div>
@endsection
