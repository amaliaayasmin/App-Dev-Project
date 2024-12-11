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

<div class="container mx-auto mt-8">
    <div class="text-left">
        <h1 class="header">Applicants for {{ $post->title }}</h1>
    </div>
    @if ($applicants->isEmpty())
        <p>No applicants yet for this post.</p>
    @else
        <table class="table-auto w-full border-collapse border border-gray-200 mt-4">
            <thead>
                <tr>
                    <th class="border px-4 py-2 bg-gray-100">Name</th>
                    <th class="border px-4 py-2 bg-gray-100">Email</th>
                    <th class="border px-4 py-2 bg-gray-100">Applied At</th>
                    <th class="border px-4 py-2 bg-gray-100">Program Title</th>
                    <th class="border px-4 py-2 bg-gray-100">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applicants as $applicant)
                    <tr>
                        <td class="border px-4 py-2">
                            <a 
                                href="{{ route('students.show', $applicant->id) }}" 
                                class="text-blue-500 hover:underline"
                            >
                                {{ $applicant->name }}
                            </a>
                        </td>
                        <td class="border px-4 py-2">{{ $applicant->email }}</td>
                        <td class="border px-4 py-2">
                            {{ $applicant->pivot->created_at->setTimezone('Asia/Kuala_Lumpur')->format('d M Y, h:i A') }}
                        </td>
                        <td class="border px-4 py-2">{{ $post->title }}</td>
                        <td class="border px-4 py-2">
                            <a 
                                href="{{ route('students.show', $applicant->id) }}" 
                                class="btn btn-primary text-white px-4 py-2 rounded"
                            >
                                View Profile
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

@endsection
