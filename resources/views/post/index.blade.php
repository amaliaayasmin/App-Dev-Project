@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Posts List
                    <a href="{{ route('post.create') }}" class="btn btn-primary float-end">Add Post</a>
                    </h4>
                </div>
                <div class="card-body">
                <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->start_date }}</td>
                                        <td>{{ $post->start_date }}</td>
                                        <td>
                                            <img src ="{{asset('images/' . $post->image)}}" style = "width: 70px; height:70px "alt = "" >
                                        </td>
                                        <td>
                                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-success btn-sm">Edit</a>
                                            <a href="{{ route('post.show', $post->id) }}" class="btn btn-info btn-sm">Show</a>
                                            <form action="{{ route('post.destroy', $post->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div></div></div></div></div></div>
                    
@endsection


