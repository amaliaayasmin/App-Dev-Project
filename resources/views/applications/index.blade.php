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
    }

</style>

<body class="bg">
    <div class="container py-3">
        <!-- Header -->
        <div class="text-left">
            <h1 class="upcoming-header">My Applications</h1>
        </div>
   
        @if ($appliedPrograms->isEmpty())
            <p>No applications yet</p>
        @else
            <table class="table-auto w-full border-collapse border border-gray-200">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">Program Title</th>
                        <th class="border px-4 py-2">Applied At</th>
                        <th class="border px-4 py-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appliedPrograms as $program)
                        <tr>
                            <td class="border px-4 py-2">{{ $program->title }}</td>
                            <td class="border px-4 py-2">{{ $program->pivot->created_at->diffForHumans() }}</td>
                            <td class="border px-4 py-2">
                                @if($program->pivot->status === 'accepted')
                                    <span class="badge bg-success">Accepted</span>
                                @elseif($program->pivot->status === 'rejected')
                                    <span class="badge bg-danger">Rejected</span>
                                @else
                                    <span class="badge bg-warning">Pending</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
@endsection