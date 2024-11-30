@extends('layouts.app')

@section('content')

<style>
    .header {
        font-size: 30px;
        font-weight: bold;
        color: #750000; /* Maroon */
        margin: 20px;
    }
</style>

<body class="bg">
    <div class="container py-3">
        <div class="text-left">
            <h1 class="header">My Applications</h1>
        </div>
    
        @if ($appliedPrograms->isEmpty())
        <p>No applications yet</p>
    @else
        <table class="table-auto w-full border-collapse border border-gray-200">
            <thead>
                <tr>
                    <th class="border px-4 py-2">ProgramTitle</th>
                    <th class="border px-4 py-2">Applied At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appliedPrograms as $program)
                    <tr>
                        <td class="border px-4 py-2">{{ $program->title  }}</td>
                        <td class="border px-4 py-2">{{ $program->created_at->diffForHumans() }}</td>
                    </tr>
                @endforeach
            </tbody>
            
    @endif
        
    </div>
</body>
@endsection