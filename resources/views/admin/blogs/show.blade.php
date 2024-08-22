@extends('layouts.admin')

@section('title', 'View Blog Post')

@section('content')
    <h2>{{ $blog->title }}</h2>

    <div>
        <p>{{ $blog->content }}</p>
        @if($blog->image)
            <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image">
        @endif
    </div>

    <a href="{{ route('admin.blogs.edit', $blog->id) }}">Edit Blog Post</a>
@endsection
