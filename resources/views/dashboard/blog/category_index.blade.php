<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Post Category</title>

    @include('imports.css')
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <header>
        @include('layouts.navbar')
    </header>

    <h1 class="main-catalog-header  frow jccenter aicenter h-97">{{$category}}</h1>
    
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
        <div class='fwrap category-catalog'>
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

    <footer>
        @include('layouts.footer')
    </footer>
    <script src="{{ asset('js/sidebar.js') }}"></script>
    <script src="{{ asset('js/navbar.js') }}"></script>
    <script src="{{ asset('js/slider.js') }}"></script>
</body>
</html>