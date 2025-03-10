@extends('layouts.app')

@section('title', 'Main Blog Page')

@section('style')
    <link rel="stylesheet" href="{{asset('css/blog.css')}}">
@endsection

@section('content')

    <h1 class="main-catalog-header frow jccenter aicenter">LATEST</h1>

    @if ($later->count() > 0)
        <main class="main-catalog-blog" data-sliderz-main>

            <section class="slider-control">
                <div data-slider_controller="left"> <i class="fa-solid fa-arrow-left"></i> </div>
                <div data-slider_controller="right"> <i class="fa-solid fa-arrow-right"></i> </div>
            </section>

            <div class="" data-slider-holder style="--height-slider: 380px">
                <ul data-slider-track='100'>

                    @foreach ($later as $item)
                        <li class="" data-tab data-slider-item>

                            <div class="main-catalog-blog-all-container ">
                                <img class='main-catalog-blog-img' src="/storage/{{ $item->thumbnail }}" alt="">

                                <div class="main-catalog-blog-content-container fcol">
                                    <h5 class="main-catalog-blog-date">{{ $item->created_at->format('d M Y') }}</h5>
                                    <h3 class="main-catalog-blog-title blog-title">{{ $item->title }} </h3>
                                    <p class="main-catalog-blog-content blog-content">{!! strip_tags($item->content) !!}</p>
                                    <button class="basic-button"
                                        onclick="window.location.href ='{{ url('blogs/detail', $item->slug) }}'">Baca
                                        Selengkapnya</button>
                                </div>
                            </div>

                        </li>
                    @endforeach

                </ul>

            </div>

            <div class="sliderz-indicator" data-sliderz-indicator>
            </div>
        </main>
    @else
        <div class='not-found-image-container'>
            <img class='not-found-data' src="{{ asset('images/not-found.png') }}" alt="">
        </div>
    @endif

    <h1 class="main-catalog-subheader frow aicenter h-95">RELATED POST</h1>
    @if (isset($first_related))
        <section class="padding-blog categorical-catalog-1">
            <a href="{{ url('blogs/detail', $first_related->slug) }}"
                class="fcol  categorical-decor-top g-1 categorical-1-left">
                <img class="" src="/storage/{{ $first_related->thumbnail }}" alt="">
                <h3 class='mt-20 blog-title-text h-94 bwe'>{{ $first_related->title }}</h3>
                <h3 class="blog-content-text blog-title-text h-93 rwe">{!! strip_tags($item->content) !!}</h3>
                <h3 class='h-93'>{{ $item->created_at->format('d M Y') }}</h3>
            </a>

            @if ($other_related->count() > 0)
                <div class="categorical-other-catalaog">

                    @foreach ($other_related as $item)
                        <a href="{{ url('blogs/detail', $item->slug) }}"
                            class="frow g-1 categorical-decor-left categorical-1-column">
                            <img src="/storage/{{ $item->thumbnail }}" alt="">

                            <div class='fcol aicneter jccenter p-10'>
                                <h3 class='h-93 rwe blog-title-text'>{{ $item->title }}</h3>
                                <h3 class='h-93'>{{ $item->created_at->format('d M Y') }}</h3>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <div class='not-found-image-container'>
                    <img class='not-found-data' src="{{ asset('images/not-found.png') }}" alt="">
                </div>
            @endif
        </section>
    @else
        <div class='not-found-image-container'>
            <img class='not-found-data' src="{{ asset('images/not-found.png') }}" alt="">
        </div>
    @endif

    <h1 class="main-catalog-subheader frow aicenter h-95">EDITIOR'S CHOICE</h1>
    @if ($editors_choice->count() > 0)
        <section class="padding-blog categorical-catalog-2">
            @foreach ($editors_choice as $item)
                <a href="{{ url('blogs/detail', $item->slug) }}" class="fcol categorical-decor-top categorical-2-left">
                    <img class="" src="/storage/{{ $item->thumbnail }}" alt="">
                    <button class='mt-20 blog-title-categ h-92 mt-4 rwe'>{{ $item->category }}</button>
                    <h3 class='mt-20 blog-title-text h-93 sbwe'>{{ $item->title }}</h3>
                    <h3 class='h-92'>{{ $item->created_at->format('d M Y') }}</h3>
                </a>
            @endforeach
        </section>
    @else
        <div class='not-found-image-container'>
            <img class='not-found-data' src="{{ asset('images/not-found.png') }}" alt="">
        </div>
    @endif

    <section class="padding-blog mb-extra fcol g-2 tab-section">

        <form class="search-container" action="{{ url('blogs/search') }}" method="GET">
            <input name="query" type="text" placeholder='New Search'>
            <button>
                <i class="fa-solid fa-search"></i>
            </button>
        </form>

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


    @endsection

    @section('script')
    <script src="{{ asset('js/slider.js') }}"></script>
    @endsection
