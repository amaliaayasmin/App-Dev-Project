@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-cP3e1B8zuKB1pvSX6KPZ9HIe6ABR4k3gMlQe6BKOwCjEOLWxlAuc3SAvT0fInG2A" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- FullCalendar CSS and JS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.js"></script>
    

    <style>
        body {
            font-family: "Times New Roman", serif;
            background-color: #ffffff;
        }

        .carousel-inner img {
            max-height: 400px;
            object-fit: cover;
        }

        .carousel-caption {
            position: absolute;
            top: 50%;
            left: 10%;
            transform: translate(0, -50%);
            color: white;
            background-color: rgba(128, 0, 0, 0.7); /* Maroon with transparency */
            padding: 20px;
            border-radius: 10px;
            text-align: left; /* Align the text to the left */
        }

        .carousel-caption h1 {
            font-size: 36px;
            font-weight: bold;
        }

        .carousel-caption h3 {
            font-size: 18px;
        }

        .bg {
            background: #f5f5f5;
        }

        /* Header styling */
        .upcoming-header {
            font-size: 37px; /* Increased size for better visibility */
            font-weight: bold;
            color: #800000;
            margin: 20px;
        }

        .box {
    background: rgb(203, 144, 144); /* Warm peach to light yellow gradient */
    color:rgb(0, 0, 0); /* Dark gray text */
    padding: 20px;
    border-radius: 15px;
    text-align: center;
    font-size: 18px;
    font-weight: bold;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.box:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
}


        .box-container {
            display: flex;
            gap: 20px;
            justify-content: space-between;
        }

        .box-container .box {
            flex: 1;
            box-sizing: border-box;
        }

        /* Calendar Section */
        #calendar {
            margin-top: 30px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f5f5f5;
        }

        /* Custom FullCalendar Theme - Maroon and Gray */
        .fc {
            font-family: "Times New Roman", serif;
        }

        .fc .fc-toolbar {
            background-color: none;
            color: maroon;
            border-radius: 10px;
            padding: 10px;
        }

        .fc .fc-toolbar-title {
            font-size: 24px;
            font-weight: bold;
        }

        .fc .fc-button {
            background-color: maroon;
            color: white;
            border: none;
        }

        .fc .fc-button:hover {
            background-color: darkred;
        }

        .fc .fc-daygrid-day {
            background-color: #f5f5f5;
            border-radius: 5px;
        }

        .fc .fc-daygrid-day-number {
            color: maroon;
        }

        .fc .fc-daygrid-day:hover {
            background-color: lightgray;
        }

        .fc .fc-event {
            background-color: maroon;
            color: white;
            border: none;
        }

        .fc .fc-event:hover {
            background-color: white;
        }

        .floating-btn i {
    margin-right: 10px; /* Adds space between the star icon and the text */
}

.floating-btn {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #800000;
    color: white;
    padding: 15px;
    border-radius: 50%;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    cursor: pointer;
    z-index: 1000;
    font-size: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
}


.floating-btn:hover {
    background-color: #a00000;
}

.emoji-btn {
    font-size: 30px;
    margin: 0 10px;
    border: none;
    background: none;
    cursor: pointer;
    transition: transform 0.3s ease;
}

.emoji-btn:hover {
    transform: scale(1.2);
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
    background: linear-gradient(135deg, #6a11cb, #2575fc); /* Gradient Header */
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

/* Modal Footer Buttons */
.rate-us-modal .btn {
    border-radius: 25px;
    padding: 8px 20px;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
}

.rate-us-modal .btn-primary {
    background-color: #34d399; /* Teal */
    color: white;
    border: none;
}

.rate-us-modal .btn-primary:hover {
    background-color: #059669;
    box-shadow: 0 5px 15px rgba(5, 150, 105, 0.4);
}


    </style>
</head>

<body class="bg">
    <div class="container py-3">
        <!-- Header -->
        <div class="text-left">
            <h1 class="upcoming-header">{{ __('Welcome, ' . Auth::user()->name . '!') }}</h1>
        </div>

        <div class="container py-3">
            <!-- Autoplay Slide Image Section -->
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('images/utm.gif') }}" class="d-block w-100" alt="Animated Slide">
                    </div>
                </div>
            </div>
        </div>

        <!-- Overview Section -->
        <div class="text-left">
            <h1 class="upcoming-header">Overview</h1>
        </div>

        <!-- Box Container Section -->
        <div class="box-container py-4">
    <!-- Box 1 -->
    <div class="box">
        Total number of programs in Feed page: <span id="feed-count"></span>
    </div>

    <!-- Box 2 -->
    <div class="box">
        Total number of saved programs: <span id="saved-count"></span>
    </div>

    <!-- Box 3 -->
    <div class="box">
        Total number of joined programs (applied): <span id="joined-count"></span>
    </div>
</div>

        <!-- Calendar Section -->
        <div id="calendar"></div>

        <!-- Floating Button -->
<div id="rate-us-btn" class="floating-btn">
    <i class="fas fa-star"></i> Rate Us
</div>
       <!-- Modal -->
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

    <script>
    $(document).ready(function () {
    // Trigger modal on button click
    $('#rate-us-btn').click(function () {
        $('#rateUsModal').modal('show');
    });

     // Emoji button click feedback
     $('.emoji-btn').on('click', function () {
        $('.emoji-btn').removeClass('selected'); // Remove selection from others
        $(this).addClass('selected'); // Highlight selected emoji
    });

    // Submit button logic
    $('#submitRating').click(function () {
        const rating = $('.emoji-btn.selected').attr('data-rate'); // Get selected rating
        const message = $('#rateMessage').val(); // Get feedback message

        if (rating) {
            alert(`Thank you for your feedback! Rating: ${rating}\nMessage: ${message}`);
            $('#rateUsModal').modal('hide'); // Close the modal
        } else {
            alert('Please select a rating!');
        }
    });
});

    </script>

    <script>
        // Example data, you can dynamically fetch these from your backend
        const feedCount = 25; // Placeholder value for feed count
        const savedCount = 10; // Placeholder value for saved programs
        const joinedCount = 5; // Placeholder value for joined programs

        // Set the values dynamically
        document.getElementById('feed-count').textContent = feedCount;
        document.getElementById('saved-count').textContent = savedCount;
        document.getElementById('joined-count').textContent = joinedCount;
        
        // Initialize the FullCalendar
        var calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
            initialView: 'dayGridMonth',
            events: [
                {
                    title: 'Sample Event 1',
                    start: '2024-12-25',
                    description: 'This is a sample event for demonstration purposes.',
                },
                {
                    title: 'Sample Event 2',
                    start: '2024-12-28',
                    description: 'Another sample event.',
                }
            ],
            eventClick: function(info) {
                alert('Event: ' + info.event.title + '\nDate: ' + info.event.start.toISOString());
            }
        });

        // Render the calendar
        calendar.render();
        
        // Explicitly initialize the carousel
        var carousel = new bootstrap.Carousel(document.getElementById('carouselExample'), {
            interval: 5000,
            wrap: true
        });
    </script>

</body>

</html>
@endsection