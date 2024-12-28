@extends('layouts.app')

@section('content')
<div class="container mt-4" style="font-family: 'Poppins', sans-serif;">
    <!-- Header Section -->
    <div class="cover-photo" style="position: relative; height: 300px; background: url('{{ $organizer->header_image ? asset('storage/' . $organizer->header_image) : asset('img/default-header.jpg') }}') no-repeat center center / cover; ">
        <!-- Profile Picture -->
        <div class="profile-picture" style="position: absolute; bottom: -75px; left: 20px;">
            <img 
                src="{{ $organizer->profile_image ? asset('storage/' . $organizer->profile_image) : asset('img/default-profile1.jpg') }}" 
                alt="Profile Image" 
                class="rounded-circle border border-white shadow" 
                style="width: 150px; height: 150px; object-fit: cover; background-color: #f8f9fa; display: flex; align-items: center; justify-content: center;"
            >
        </div>
    </div>

    <!-- Organizer Info Section -->
    <div class="d-flex align-items-center mt-5" style="margin-left: 180px;"> <!-- Adjust margin-top value here -->
        <!-- Organizer Name and Year Beside Profile Picture -->
        <div style="margin-top: -50px;">
            <h1 class="fw-bold" style="font-size: 1.8rem; margin-top: 0.3rem;">{{ $organizer->name }}</h1>
            <p class="text-muted" style="margin: 0; font-size: 0.9rem;">
                {{ $organizer->year_established ? 'Established in ' . $organizer->year_established : 'Year established not provided' }}
            </p>
        </div>
    </div>
    
    <!-- Description Section -->
    <div class="card mt-4">
        <div class="card-body">
            <h5 class="fw-bold">Description:</h5>
            <p>
                {{ $organizer->description ? $organizer->description : 'No description available.' }}
            </p>
        </div>
    </div>
</div>
@endsection
