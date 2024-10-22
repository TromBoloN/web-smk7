<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Blog Posts</title>
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
        @include('layouts.partials.navbar')
    </header>

    <main>
        <div class="container">
            <h1 class="mt-4 mb-4">All Blog Posts</h1>
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                
                                @if($post->thumbnail)
                                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Thumbnail" class="img-fluid mb-3">
                                @endif

                               
                                <h2 class="card-title">
                                    <a href="{{ route('berita.show', $post->slug) }}">{{ $post->title }}</a>
                                </h2>

                                
                                <div class="card-meta mb-2 text-muted">
                                    <span><i class="fa-solid fa-calendar-days"></i> {{ $post->created_at ? $post->created_at->format('F d, Y') : 'Unpublished' }}</span>
                                    <span><i class="fa-regular fa-user"></i> {{ $post->user->username ?? 'Unknown Author' }}</span>
                                    <span><i class="fas fa-folder"></i> {{ $post->category }}</span>
                                </div>

                                
                                <p class="card-text">{{ Str::limit(strip_tags($post->content), 150, '...') }}</p>

                                
                                <a href="{{ route('berita.show', $post->slug) }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            
            <div class="d-flex justify-content-center mt-4">
                {{ $posts->links() }}
            </div>
        </div>
    </main>

    <footer>
        @include('layouts.partials.footer')
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
