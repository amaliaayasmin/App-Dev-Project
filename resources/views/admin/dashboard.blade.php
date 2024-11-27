@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <h1>Admin Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Organizer</li>
    </ol>

    <!-- Organizers Table -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($organizers as $organizer)
                    <tr>
                        <td>{{ $organizer->id }}</td>
                        <td>{{ $organizer->name }}</td>
                        <td>{{ $organizer->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
