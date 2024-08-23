@extends('layouts.admin')

@section('content')
    <h1>Manage Blog Posts</h1>
    <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">Create New Blog Post</a>

    <div class="container mt-4">
        @foreach ($blogs as $blog)
            <div class="blog-card mb-4 p-3 border rounded">
                <h2>{{ $blog->title }}</h2>

                @if ($blog->image)
                    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }} Image" class="img-fluid mb-3" style="max-width: 100%; border-radius: 8px;">
                @endif

                <p>{{ $blog->content }}</p>

                <div class="mt-2">
                    <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
