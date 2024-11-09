<!-- resources/views/feed.blade.php -->
@extends('layouts.app')

@section('content')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Program Feed') }}
        </h2>
    </x-slot>

    

          <!--  @foreach($programs as $program)
                <li>{{ $program->title }} - {{ $program->description }}</li>
            @endforeach
        </ul> -->
    </div>
@endsection

</x-app-layout>