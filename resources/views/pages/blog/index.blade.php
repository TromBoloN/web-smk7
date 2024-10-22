@extends('layouts.admin')

@section('content')
<div class="flex items-center justify-between mb-4">
    <h2 class="text-2xl font-bold">Blog Posts</h2>
    <a href="{{ route('blog.create') }}" class="button">Add Blog Post</a>
</div>

<table class="w-full mt-4 border-collapse border border-gray-200">
    <thead>
        <tr class="bg-gray-100">
            <th class="border px-4 py-2">Title</th>
            <th class="border px-4 py-2">Author</th>
            <th class="border px-4 py-2">Category</th>
            <th class="border px-4 py-2">Thumbnail</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td class="border px-4 py-2">{{ $post->title }}</td>
                <td class="border px-4 py-2">{{ $post->user->username }}</td>
                <td class="border px-4 py-2">{{ $post->category }}</td>
                <td class="border px-4 py-2">
                    @if ($post->thumbnail)
                        <img src="{{ asset('storage/' . $post->thumbnail) }}" width="50" height="50" alt="Thumbnail">
                    @endif
                </td>
                <td class="border px-4 py-2">
                    <a href="{{ route('blog.edit', $post->post_id) }}" class="button button-yellow">Edit</a>
                    <form action="{{ route('blog.destroy', $post->post_id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button button-red">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
