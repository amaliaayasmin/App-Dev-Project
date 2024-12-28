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

        /* Floating Button */
        .floating-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: linear-gradient(135deg, #ff9966, #ff5e62);
            color: white;
            border-radius: 50px;
            padding: 10px 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            font-size: 16px;
        }

        .floating-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        /* Modal Content Styling */
        .rate-us-modal {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .rate-us-modal .modal-header {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: white;
            border-bottom: none;
            padding: 20px;
        }

        .rate-us-modal .modal-title {
            font-family: 'Poppins', sans-serif;
            font-size: 20px;
        }

        .rate-us-modal .modal-body {
            font-family: 'Roboto', sans-serif;
            font-size: 16px;
            color: #555;
        }

        .rate-us-modal .emoji-btn {
            font-size: 30px;
            background: transparent;
            border: none;
            cursor: pointer;
            transition: transform 0.2s ease, filter 0.2s ease;
        }

        .rate-us-modal .emoji-btn:hover {
            transform: scale(1.3);
            filter: brightness(1.2);
        }

        .rate-us-modal .form-control {
            border-radius: 10px;
            border: 1px solid #ddd;
            padding: 10px;
            transition: box-shadow 0.2s ease;
        }

        .rate-us-modal .form-control:focus {
            box-shadow: 0 0 10px rgba(50, 150, 250, 0.4);
        }

        .rate-us-modal .btn {
            border-radius: 25px;
            padding: 8px 20px;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .rate-us-modal .btn-primary {
            background-color: #34d399;
            color: white;
            border: none;
        }

        .rate-us-modal .btn-primary:hover {
            background-color: #059669;
            box-shadow: 0 5px 15px rgba(5, 150, 105, 0.4);
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
  
        <!-- Floating Rate Us Button -->
        <div id="rate-us-btn" class="floating-btn">
            <i class="fas fa-star"></i> Rate Us
        </div>
        
        <!-- Rate Us Modal -->
        <div class="modal fade" id="rateUsModal" tabindex="-1" aria-labelledby="rateUsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rate-us-modal">
                    <div class="modal-header">
                        <h5 class="modal-title" id="rateUsModalLabel">⭐ Rate Us</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <p>We value your feedback! Please rate your experience:</p>
                        <div class="d-flex justify-content-center gap-3 my-3">
                            <button type="button" class="btn emoji-btn" data-rate="sad">😢</button>
                            <button type="button" class="btn emoji-btn" data-rate="ok">🙂</button>
                            <button type="button" class="btn emoji-btn" data-rate="smile">😊</button>
                        </div>
                        <textarea id="rateMessage" class="form-control mt-3" placeholder="Leave your feedback"></textarea>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="submitRating" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
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
    <script>
        $(document).ready(function () {
            // Trigger modal on button click
            $('#rate-us-btn').click(function () {
                $('#rateUsModal').modal('show');
            });

            // Emoji button click feedback
            $('.emoji-btn').on('click', function () {
                $('.emoji-btn').removeClass('selected');
                $(this).addClass('selected');
            });

            // Submit button logic
            $('#submitRating').click(function () {
                const rating = $('.emoji-btn.selected').attr('data-rate');
                const message = $('#rateMessage').val();

                if (rating) {
                    alert(`Thank you for your feedback! Rating: ${rating}\nMessage: ${message}`);
                    $('#rateUsModal').modal('hide');
                } else {
                    alert('Please select a rating!');
                }
            });
        });
        
    
    </script>
</body>

</html>
@endsection