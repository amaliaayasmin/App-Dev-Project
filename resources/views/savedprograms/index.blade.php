@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

    .custom-bg {
        background-color: #d5d9da;
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

    .bookmark {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
        width: 24px;
        height: 24px;
        fill: none; /* Default empty */
        stroke: #800000; /* Stroke color */
        stroke-width: 2;
    }

     /* For Debugging: Remove if unnecessary */
     .bookmark:hover {
        fill: #800000;
        transition: fill 0.3s;
    }
</style>

<body class="bg">
    <div class="container py-3">
        <!-- Header -->
        <div class="text-left">
            <h1 class="upcoming-header">Saved Programs</h1>
        </div>

        <!-- Content Section -->
        <div class="row m-0 p-1">
            @if ($savedPrograms->isEmpty())
                <p>No saved programs found.</p>
            @else
                @foreach ($savedPrograms as $saved)
                    <div class="col-12 shadow-sm custom-bg p-2 d-flex mb-3 br5" style="position: relative;">
                        <div class="image">
                            <img class="br5" src="{{ asset('images/' . $saved->post->image) }}" width="100%" height="100%">
                        </div>

                        <!-- Bookmark Icon 
                        <svg onclick="toggleBookmark(this, {{ $saved->post->id }})" xmlns="http://www.w3.org/2000/svg" 
                            class="bookmark" fill="{{ $saved->post->is_saved ? '#800000' : 'none' }}">
                            <path d="M6 3h12a2 2 0 0 1 2 2v16l-8-4-8 4V5a2 2 0 0 1 2-2z" stroke="#800000" stroke-width="2">
                        </svg> -->

                        <div class="px-2 content">
                            <!-- Content details -->
                            <a href="{{ route('post.show', $saved->post->id) }}" style="text-decoration: none; color: inherit;">
                                <p class="mb-1 fw600 fz120">{{ $saved->post->title }}</p>
                            </a>
                            <p class="mb-1 fw400 fz90">Organizer: {{ $saved->post->organizer->name ?? 'N/A' }}</p>
                            <p class="mb-1 fw400 fz90">Location: {{ $saved->post->location }}</p>
                            <p class="mb-1 text-cl fw400 fz90">Start Date: {{ $saved->post->start_date }}</p>
                            <p class="mb-1 text-cl fw400 fz90">End Date: {{ $saved->post->end_date }}</p>
                            <p class="mb-1 fw400 fz90">Start Time: {{ $saved->post->start_time }}</p>
                            <p class="mb-1 fw400 fz90">End Time: {{ $saved->post->end_time }}</p>
                            <p class="mb-1 fw400 fz90">Benefits: {{ $saved->post->benefits }}</p>
                            <p class="mb-1 fw400 fz90">Descriptions: {{ $saved->post->description }}</p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <!-- JavaScript 
<script>
    function toggleBookmark(svgElement, postId) {
        const isSaved = svgElement.getAttribute("fill") === "#800000";

        // Send AJAX request to update save status
        fetch(`/toggle-bookmark/${postId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ is_saved: !isSaved })
        }).then(response => response.json())
          .then(data => {
            if (data.success) {
                // If unsaving, remove the post from the saved programs list
                if (isSaved) {
                    const programElement = document.getElementById(`program-${postId}`);
                    programElement.remove();

                    // Check if container is empty and show "No saved programs" message
                    if (!document.querySelector('#saved-programs-container').children.length) {
                        document.querySelector('#saved-programs-container').innerHTML = '<p>No saved programs found.</p>';
                    }
                } else {
                    // Update the icon fill if saving
                    svgElement.setAttribute("fill", "#800000");
                }

                
            } else {
                alert("Failed to update bookmark status.");
            }
        }).catch(() => {
            alert("An error occurred while updating the bookmark.");
        });
    }
</script> -->

@endsection