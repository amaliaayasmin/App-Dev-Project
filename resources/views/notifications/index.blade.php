@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Notifications</h1>

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
@endsection