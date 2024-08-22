@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Blog Posts</h1>
    <a href="{{ route('admin.blogs.create') }}" class="btn">Create New Blog</a>
    <div class="row">
        @foreach ($blogs as $blog)
        <div class="col-md-4">
            <div class="blog-tile">
                <h2>{{ $blog->title }}</h2>
                <p>{{ $blog->content }}</p>
                @if($blog->image)
                <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" style="max-width: 100%; border-radius: 5px;">
                @endif
                <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn">Edit</a>
                <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
