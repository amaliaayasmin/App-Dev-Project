@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <script>
        // Function to show "Program successfully applied" message
        function showSuccessMessage() {
            const messageDiv = document.getElementById('success-message');
            messageDiv.style.display = 'block';
            setTimeout(() => {
                messageDiv.style.display = 'none';
            }, 3000);
        }
    </script>
</head>

<style>
    .bg {
        background: #f5f5f5;
    }

    .br5 {
        border-radius: 15px;
    }

    .image {
        width: 270px;
        height: 235px;
        overflow: hidden;
        margin-left: 15px;
        margin-right: 15px;
        margin-top: 15px;
        margin-bottom: 15px;

    }

    .content {
        width: calc(100% - 90px);
        margin-left: 15px;
    }

    .fw600 {
        font-weight: 600;
    }

    .text-cl {
        color: #e03;
    }

    .fw400 {
        font-weight: 500;
    }

    .fz90 {
        font-size: 15px;
    }

    .fz120 {
        font-size: 25px;
    }

    .fz2023 {
        font-size: 18px;
    }

    #success-message,
    #wishlist-message {
        display: none;
        background-color: #d4edda;
        color: #155724;
        padding: 10px;
        border-radius: 5px;
        margin-top: 15px;
        text-align: center;
    }

    #success-message {
        position: fixed;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        background-color: #d4edda;
        color: #155724;
        padding: 10px;
        border-radius: 5px;
        z-index: 9999;
    }

    #wishlist-message {
        position: fixed;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        background-color: #d4edda;
        color: #155724;
        padding: 10px;
        border-radius: 5px;
        z-index: 9999;
    }

    .image img {
        object-fit: cover;
        width: 100%;
        height: 100%;
    }

    /* Header styling */
    .upcoming-header {
        font-size: 30px;
        font-weight: bold;
        color: #800000;
        /* Maroon */
        margin: 20px;
    }

    .custom-bg {
        background-color: #e5e8e8;
    }
</style>

<body class="bg">
    <div class="container py-3">
        <!-- Header -->
        <div class="text-left">
            <h1 class="upcoming-header">Upcoming Events</h1>
        </div>

        <div class="row m-0 p-1">
            @foreach($posts as $post)
            <div class="col-12 shadow-sm custom-bg p-2 d-flex mb-3 br5">
                <div class="image">
                    <img class="br5" src="{{ asset('images/' . $post->image) }}" width="100%" height="100%">
                </div>
                <div class="px-2 content">
                    <a href="javascript:void(0);" onclick="toggleBookmark(this)" class="float-end">
                        <svg id="bookmark-icon" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#800000" stroke-width="2" viewBox="0 0 24 24" width="24" height="24" class="bookmark">
                            <path d="M6 3h12a2 2 0 0 1 2 2v16l-8-4-8 4V5a2 2 0 0 1 2-2z" />
                        </svg>
                    </a>


                    <script>
                        function toggleBookmark(element) {
                            // Get the SVG element
                            const svg = element.querySelector("svg");

                            // Check the current state (filled or not filled)
                            if (svg.getAttribute("fill") === "none") {
                                // Fill the bookmark with maroon color
                                svg.setAttribute("fill", "#800000"); // Maroon fill
                            } else {
                                // Reset the bookmark to empty
                                svg.setAttribute("fill", "none");
                            }
                        }
                    </script>
                    <!-- Content details -->
                    <p class="mb-1 fw600 fz120">{{ $post->title }}</p>
                    <p class="mb-1 fw400 fz90">LOCATION: {{ $post->location }}</p>
                    <p class="mb-1 text-cl fw400 fz90">START DATE: {{ $post->start_date }}</p>
                    <p class="mb-1 text-cl fw400 fz90">END DATE: {{ $post->end_date }}</p>
                    <p class="mb-1 fw400 fz90">START TIME: {{ $post->start_time }}</p>
                    <p class="mb-1 fw400 fz90">END TIME: {{ $post->end_time }}</p>
                    <p class="mb-1 fw400 fz90">BENEFITS: {{ $post->benefits }}</p>
                    <p class="mb-1 fw400 fz90">DESCRIPTIONS: {{ $post->description }}</p>

                    <button class="btn btn-success float-end mt-2" onclick="changeButtonText(this)">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Quick Apply
                    </button>


                    <script>
                        function changeButtonText(button) {
                            // Change the text to 'Applied'
                            button.innerHTML = '<i class="fa fa-check" aria-hidden="true"></i> Applied';
                            // Optionally, change the button class to reflect a different state
                            button.classList.remove('btn-success');
                            button.classList.add('btn-secondary'); // This changes the button color to grey
                        }
                    </script>

                    <!-- Messages 
                    <div id="success-message">Program successfully applied</div>
                    <div id="wishlist-message">Program added to wishlist</div>-->
                </div>
            </div>
            @endforeach
        </div>
</body>

</html>
@endsection