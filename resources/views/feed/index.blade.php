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

    .btn-success i {
        margin-right: 8px; /* Adjust the spacing as needed */
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
        margin: 20px;
    }

    .custom-bg {
        background-color: #d5d9da;
    }
</style>

<body class="bg">
    <div class="container py-3">
        <!-- Header -->
        <div class="text-left">
            <h1 class="upcoming-header">Upcoming Events</h1>
        </div>

        <!-- Search Form -->
        <form action="{{ route('feed.search') }}" method="GET" class="d-flex mb-3">
            <input type="text" name="query" class="form-control" placeholder="Search events..." value="{{ request()->query('query') }}">
            <button type="submit" class="btn btn-primary ms-2">Search</button>
        </form>

        <!-- Filter Form -->
        <form action="{{ route('feed') }}" method="GET" class="mb-4">
            <div class="d-flex">
                <input type="text" name="organization" class="form-control me-2" placeholder="Filter by Organization" value="{{ request('organization') }}">
                <input type="date" name="date" class="form-control me-2" placeholder="Filter by Date" value="{{ request('date') }}">
                <!--  <input type="text" name="activity_type" class="form-control me-2" placeholder="Filter by Activity Type" value="{{ request('activity_type') }}"> -->
                <button type="submit" class="btn btn-primary">Apply Filters</button>
            </div>
        </form>

        <!-- Content Section -->
        @if($posts->isEmpty())
            <p>No posts found matching your filter criteria.</p>
        @else
            <div class="row m-0 p-1">
                @foreach($posts as $post)
                <div class="col-12 shadow-sm custom-bg p-2 d-flex mb-3 br5">
                    <div class="image">
                        <img class="br5" src="{{ asset('images/' . $post->image) }}" width="100%" height="100%">
                    </div>

                    <!-- Bookmark button -->
                    <div class="px-2 content">
                        <a href="javascript:void(0);" onclick="toggleBookmark(this, {{ $post->id }})" class="float-end">
                            <svg id="bookmark-icon-{{ $post->id }}" xmlns="http://www.w3.org/2000/svg" fill='none' stroke="#800000" stroke-width="2" viewBox="0 0 24 24" width="24" height="24" class="bookmark">
                                <path d="M6 3h12a2 2 0 0 1 2 2v16l-8-4-8 4V5a2 2 0 0 1 2-2z" />
                            </svg>
                        </a>

                        <script>
                            function toggleBookmark(element, postId) {
                                const svg = element.querySelector("svg");
                                const isBookmarked = svg.getAttribute("fill") === "#800000";

                                 // Update bookmark UI
                                svg.setAttribute("fill", isBookmarked ? "none" : "#800000");
                               
                                // Send AJAX request to the backend
                                fetch(`/bookmark`, {
                                    method: "POST",
                                    headers: {
                                        "Content-Type": "application/json",
                                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                                    },
                                    body: JSON.stringify({ post_id: postId, bookmarked: !isBookmarked })
                                })
                                .then(response => response.json())
                                .then(data => {
                                    console.log(data.message);
                                })
                                .catch(error => {
                                    console.error("Error:", error);
                                });
                            }
                        </script>
                        
                        <!-- Content details -->
                        <a href="{{ route('post.show', $post->id) }}" style="text-decoration: none; color: inherit;">
                            <p class="mb-1 fw600 fz120">{{ $post->title }}</p>
                        </a>
                        <p class="mb-1 fw400 fz90"> Organizer: {{ $post->organizer->name ?? 'N/A' }}</p>
                        <p class="mb-1 fw400 fz90">Location: {{ $post->location }}</p>
                        <p class="mb-1 text-cl fw400 fz90">Start Date: {{ $post->start_date }}</p>
                        <p class="mb-1 text-cl fw400 fz90">End Date: {{ $post->end_date }}</p>
                        <p class="mb-1 fw400 fz90">Start Time: {{ $post->start_time }}</p>
                        <p class="mb-1 fw400 fz90">End Time: {{ $post->end_time }}</p>
                        <p class="mb-1 fw400 fz90">Benefits: {{ $post->benefits }}</p>
                        <p class="mb-1 fw400 fz90">Descriptions: {{ $post->description }}</p>

                        <button class="btn btn-success float-end mt-2" onclick="applyToProgram({{ $post->id }}, this)">
                            <i class="fa fa-plus" aria-hidden="true"></i>Quick Apply
                        </button>
                           
                        <script>
                            function applyToProgram(postId, button) {
                                fetch(`/apply/${postId}`, {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                        'Content-Type': 'application/json',
                                    },
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.message === 'Application submitted successfully') {
                                        button.innerHTML = '<i class="fa fa-check" aria-hidden="true"></i> Applied';
                                        button.classList.remove('btn-success');
                                        button.classList.add('btn-secondary');
                                        button.disabled = true;
                                    } else {
                                        alert(data.message);
                                    }
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                    alert('Failed to apply. Please try again.');
                                });
                            }
                        </script>

                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</body>

</html>

@endsection
