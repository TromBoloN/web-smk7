@extends('layouts.app')

@section('title', 'Search Results')

@section('content')

    <main class="main-blog-detail">
        <!-- Blog Post Content and Comment Section -->
        <section class="blog-content-container fcol ga-4">
            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Thumbnail" class="blog-image">
            <h3 class="blog-head">{{ $post->title }}</h3>
            <div class='blog-information'>

                <div>
                    <i class="fa-solid fa-calendar"></i>
                    <span>Unpublished</span>
                </div>

                <div>
                    <i class="fa-solid fa-comments"></i>
                    <span>0 Comments</span>
                </div>

                <div>
                    <i class="fa-solid fa-user"></i>
                    <span>{{ $post->user->username ?? 'Unknown Author' }}</span>
                </div>

                <div>
                    <i class="fa-solid fa-folder"></i>
                    <span>{{ $post->category }}</span>
                </div>

            </div>
            <div class='blog-content'>
                {!! $post->content !!}
            </div>
        </section>

        <section class="fcol g-1">

            <form class="search-container" action="{{ url('blogs/search') }}" method="GET">
                <input name="query" type="text" placeholder='New Search'>
                <button>
                    <i class="fa-solid fa-search"></i>
                </button>
            </form>

            <section class="blog-recommendation fcol">
                <h5>POST TERKINI</h5>
                <section class="fcol g-2">
                    @foreach ($posts as $post)
                        <a href="{{ url("blogs/detail/$post->slug") }}"
                            class="blog-recommendation-child {{ $post->created_at->diffInDays(now()) < 3 ? 'hot-blog' : '' }} ">{{ $post->title }}</a>
                    @endforeach
                </section>
            </section>

            <section class="blog-categories fcol">
                <h5>Kategori</h5>
                <section class="fcol g-2">
                    <a href="{{ url('blogs/') }}" class="blog-recommendation-child">Main Blogs</a>

                    @foreach ($post_category as $post_C)
                        <a href="{{ url("blogs/category/$post_C") }}"
                            class="blog-recommendation-child">{{ $post_C }}</a>
                    @endforeach
                </section>

            </section>

        </section>

    </main>

@endsection