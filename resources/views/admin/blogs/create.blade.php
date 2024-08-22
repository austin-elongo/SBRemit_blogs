@extends('layouts.admin')

@section('content')
    <h1>Create Blog Post</h1>
    <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>

        <label for="content">Content:</label>
        <textarea id="content" name="content" required></textarea>

        <label for="image">Image:</label>
        <input type="file" id="image" name="image" required>

        <label for="category_id">Category:</label>
        <select id="category_id" name="category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <button type="submit">Save</button>
    </form>
@endsection
