@extends('layouts.app')

@section('title', 'Search Results')

@section('content')

<h2 class="text-2xl font-bold mb-4">Search Results for "{{ $query }}"</h2>

    @if($posts->count() > 0)
        <div class="blog-list">
            @foreach ($posts as $post)
                <div class="blog-item">
                    <h3><a href="{{ route('berita.show', $post->slug) }}">{{ $post->title }}</a></h3>
                </div>
            @endforeach
        </div>

        {{ $posts->links() }}
    @else
        <p>No posts found.</p>
    @endif

@endsection
