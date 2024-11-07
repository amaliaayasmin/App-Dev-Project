<!-- resources/views/search/results.blade.php -->
@extends('layout')

@section('title', 'Search Results')

@section('content')
    <h1>Search Results for "{{ $query }}"</h1>
    <!-- Display results here -->
@endsection
