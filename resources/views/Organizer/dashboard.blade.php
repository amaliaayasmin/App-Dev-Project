@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.js"></script>

    <style>
        body {
            font-family: "Times New Roman", serif;
            background-color: #ffffff;
        }

        .bg {
            background: #f5f5f5;
        }

        .upcoming-header {
            font-size: 37px;
            font-weight: bold;
            color: #800000;
            margin: 20px;
        }

        .box {
            background: rgba(252, 252, 252, 0.66);
            color: rgb(0, 0, 0);
            padding: 10px;
            border-radius: 10px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        

        /* Calendar Section */
        #calendar {
            margin-top: 30px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f5f5f5;
        }

        .event-count-container {
            //background-color:rgb(255, 255, 255); /* Light background color */
            padding: 15px;
            border-radius: 10px;
            display: flex;
            justify-content: space-between; /* Space items evenly */
            align-items: center; /* Center items vertically */
            margin-top: 0px; /* Add some margin on top */
        }

        .description-card {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color:rgba(255, 255, 255, 0.81); /* White background for the description */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg">
    <div class="container mt-4" style="font-family: 'Poppins', sans-serif;">
        <!-- Header Section -->
        <div class="text-left">
            <h1 class="upcoming-header">{{ __('Welcome, ' . $user->name . '!') }}</h1>
        </div>
        <div class="cover-photo" style="position: relative; height: 300px; background: url('{{ $user->header_image ? asset('storage/' . $user->header_image) : asset('default-cover.jpg') }}') no-repeat center center / cover;">
            <!-- Profile Picture -->
            <div class="profile-picture" style="position: absolute; bottom: -75px; left: 20px;">
                <img 
                    src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('default-profile.png') }}" 
                    alt="Profile Image" 
                    class="rounded-circle border border-white shadow" 
                    style="width: 150px; height: 150px; object-fit: cover;"
                >
            </div>
        </div>

        <!-- Organizer Info Section -->
    <div class="d-flex align-items-center mt-5" style="margin-left: 180px;"> <!-- Adjust margin-top value here -->
        <!-- Organizer Name and Year Beside Profile Picture -->
        <div style="margin-top: -50px;">
            <h1 class="fw-bold" style="font-size: 1.8rem; margin-top: 0.3rem;">{{ $user->name }}</h1>
            <p class="text-muted" style="margin: 0; font-size: 0.9rem;">
                {{ $user->year_established ? 'Established in ' . $user->year_established : 'Year established not provided' }}
            </p>
        </div>
    </div>
    
    <!-- Description Section -->
    <div class="description-card">
            <p  style="margin: 0; font-size: 1rem;">
                {{ $user->description ? $user->description : 'No description available.' }}
            </p>
        </div>
    </div>
    
    <div class="container py-3">
        <!-- Event Count Section -->
        <div class="row event-count-container"> <!-- Added margin-top to ensure spacing -->
            <div class="col-md-6">
                <div class="box">
                    Upcoming Events: <strong>{{ $upcomingCount }}</strong>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box">
                    Past Events: <strong>{{ $pastCount }}</strong>
                </div>
            </div>
        </div>
        <!-- Calendar Section    -->
        
        <div id="calendar"></div>
        </div>
  
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var posts = @json($posts); // Pass posts from the controller to JavaScript

 var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: posts.map(function(post) {
                    return {
                        title: post.title,
                        start: post.start_date,
                        end: post.end_date,
                    };
                }),
            });

            calendar.render();
        });
    </script>
</body>

</html>
@endsection