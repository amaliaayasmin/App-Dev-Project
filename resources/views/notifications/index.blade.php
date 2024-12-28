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

    /* Header styling */
    .upcoming-header {
        font-size: 30px;
        font-weight: bold;
        color: #800000;
        margin: 20px;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
    }
</style>

<body class="bg">
<div class="container py-3">
        <!-- Header -->
        <div class="text-left">
            <h1 class="upcoming-header">Notifications</h1>
        </div>

    @if(auth()->user()->notifications->isEmpty())
        <p>You have no notifications.</p>
    @else
        <ul class="list-group">
            @foreach(auth()->user()->notifications as $notification)
                <li class="list-group-item">
                    <strong>{{ $notification->data['organizer'] ?? 'Unknown Organizer' }}:</strong> <!-- Display the organizer's name -->
                    <strong>{{ $notification->data['message'] }}</strong>
                    <br>
                    <small>Received on: {{ $notification->created_at->diffForHumans() }}</small>
                </li>
            @endforeach
        </ul>
    @endif
</div>
</body>
@endsection