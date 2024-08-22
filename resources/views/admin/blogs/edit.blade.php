@extends('layouts.admin')

@section('content')
    <h1>Edit Blog Post</h1>
    <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="{{ $blog->title }}" required>

        <label for="content">Content:</label>
        <textarea id="content" name="content" required>{{ $blog->content }}</textarea>

        <label for="image">Image:</label>
        <input type="file" id="image" name="image">

        <label for="category_id">Category:</label>
        <select id="category_id" name="category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $blog->category_id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <button type="submit">Update</button>
    </form>
@endsection
