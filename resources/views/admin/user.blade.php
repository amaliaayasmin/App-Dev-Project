@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <h1>Admin Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Add Student</li>
    </ol>

    <form action="{{ route('add.user') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="employeeName" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
        </div>
        <div class="mb-3">
            <label for="employeeUrl" class="form-label">Email</label>
            <input type="email" class="form-control" name='email' placeholder="Enter Email" required>
        </div>

        <div class="mb-3">
            <label for="VertimeassageInput" class="form-label">Password</label>
            <input type="password" class="form-control" name='password' placeholder="Enter Password" required>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Add User</button>
        </div>
    </form>


@endsection
