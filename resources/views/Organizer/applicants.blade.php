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
                    <th class="border px-4 py-2 bg-gray-100">Status</th>
                    <th class="border px-4 py-2 bg-gray-100">Actions</th>
                    <th class="border px-4 py-2 bg-gray-100">Message History</th>
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
                            <span class="font-semibold {{ $applicant->pivot->status == 'accepted' ? 'text-green-600' : ($applicant->pivot->status == 'rejected' ? 'text-red-600' : 'text-yellow-600') }}">
                                {{ ucfirst($applicant->pivot->status) }}
                            </span>
                        </td>
                        <td class="border px-4 py-2">
                            <form action="{{ route('post.accept', [$post->id, $applicant->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success text-white px-4 py-2 rounded">Accept</button>
                            </form>
                            <form action="{{ route('post.reject', [$post->id, $applicant->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger text-white px-4 py-2 rounded">Reject</button>
                            </form> 
                        </td>
                        <td class="border px-4 py-2">
                            <form action="{{ route('post.sendMessage', ['postId' => $post->id, 'applicantId' => $applicant->id]) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="message-{{ $applicant->id }}" class="form-label">Custom Message</label>
                                    <textarea class="form-control" id="message-{{ $applicant->id }}" name="message" rows="3" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-success">Send Message</button>
                            </form>
                            <ul class="mt-2">
                                @if ($applicant->messages && $applicant->messages->isNotEmpty())
                                    @foreach ($applicant->messages as $message)
                                        <li>{{ $message->message }} <small class ="text-muted">({{ $message->created_at->format('Y-m-d H:i') }})</small></li>
                                    @endforeach
                                @else
                                    <li>No messages sent.</li>
                                @endif
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

@endsection