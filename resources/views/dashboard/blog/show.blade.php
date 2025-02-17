<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">

    @include('imports.css')

    <title>{{ $post->title }}</title>
</head>

<body>
    <header>
        @include('layouts.navbar')
    </header>

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
                    <span>{{$post->user->username ?? 'Unknown Author' }}</span>
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

            <section class="blog-recommendation fcol">
                <h5>POST TERKINI</h5>

                <section class="fcol g-2">
                    @foreach ($posts as $post)
                        <a href="{{url("blogs/$post->slug")}}" class="blog-recommendation-child">{{$post->title}}</a>
                    @endforeach
                </section>
            <section class="fcol g-2">

            </section>
        </section>
    </main>

    <footer>
        @include('layouts.footer')
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/featherlight/1.7.13/featherlight.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
    <script src="{{ asset('js/navbar.js') }}"></script>
</body>

</html>
