@extends('layouts.app')

@section('title', 'Search Results')
@section('style')
    <link rel="stylesheet" href="{{asset('css/blog.css')}}">
@endsection
@section('content')

<section class="frow g-2 mt-extra mb-2 padding-blog">
    <h2 class=" text-2xl font-bold search-result">Search Results for "{{ $query }}"</h2>
</section>

<section class="padding-blog mb-5 fcol g-2 tab-section">

    <form class="search-container" action="{{url('blogs/search')}}" method="GET">
            <input name="query" type="text" placeholder='New Search'>
            <button>
                <i class="fa-solid fa-search" ></i>
            </button>
    </form>
    
    <section class="blog-categories fcol">
        <h5>Kategori</h5>
        
        <section class="fcol g-2">
            
            <a href="{{url("blogs/")}}" class="blog-recommendation-child">Main Blogs</a>
            
            @foreach ($post_category as $post_C)
                <a href="{{url("blogs/category/$post_C")}}" class="blog-recommendation-child">{{$post_C}}</a>
            @endforeach

        </section>
    
    </section>
</section>

@if ($posts->count() > 0)
        <div class='fwrap category-catalog '>
            @foreach ($posts as $item)
                <a href="{{url('blogs/detail/'.$item->slug)}}" class="category-catalog-child categorical-decor-top">
                    <img class="" src="/storage/{{$item->thumbnail}}" alt="">
                    <h3 class='mt-20 blog-title-text h-93 sbwe'>{{$item->title}}</h3>
                    <h3 class='h-92'>{{ $item->created_at->format('d M Y') }}</h3>
                </a>
            @endforeach
        </div>
    @else
        <div class='not-found-image-container'>
            <img class='not-found-data' src="{{asset('images/not-found.png')}}" alt="">
        </div>
    @endif
    <div class="mb-extra d-flex justify-content-center mt-4">
        {{ $posts->links() }}
    </div>

@endsection
