@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <h2>Blog Posts</h2>

    <a href="{{ route('admin.blogs.create') }}">Create New Blog Post</a>

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>
                        <a href="{{ route('admin.blogs.edit', $post->id) }}">Edit</a>
                        <form action="{{ route('admin.blogs.destroy', $post->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
