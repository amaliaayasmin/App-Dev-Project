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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($organizers as $organizer)
                    <tr>
                        <td>{{ $organizer->id }}</td>
                        <td>{{ $organizer->name }}</td>
                        <td>{{ $organizer->email }}</td>
                        <td><a href='{{ route('delete.organizer', ['id' => $organizer->id]) }}'
                                class="btn btn-danger waves-effect waves-light">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <hr>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">User</li>
    </ol>

    <!-- Organizers Table -->
    <div class="">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->email }}</td>
                        <td>
                            <a href='{{ route('delete.user', ['id' => $p->id]) }}'
                                class="btn btn-danger waves-effect waves-light">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
