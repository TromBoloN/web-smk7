@extends('layouts.app')

@section('title', 'Detail Blog')
@section('style')
    <link rel="stylesheet" href="{{asset('css/blog.css')}}">
@endsection
@section('content')

    <main class="main-blog-detail">

        @include('layouts.alertz')
        <div class="alertz-holder" data-alertz-holder>
                
        </div>

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

       <section class="fcol comment-container">
        <form id="comment-section" class="comment-form mt-30 mb-20" action="{{url('comments')}}" method="POST">
            @csrf
            <input type="hidden" value="{{$post->id}}" name='post_id'>
            
            <section class="fcol g-1 mt-50">
                <h3 class="h-94 sbwe">Berikan Komentar</h3>
                <h3 class="h-92 rwe">Mohon untuk menjaga komentar dengan tetap mematuhi tata bahasa yang digunakan</h3>
            </section>
            <input type="text" name="name" placeholder="Nama Anda..." value="{{old('name')}}">

            <textarea name="comment" id="" placeholder="Comment..." rows="4">{{old('comment')}}</textarea>

            <section class="fcol g-1">
                <img src="{{ captcha_src('flat') }}" alt="captcha" class="captcha-img">
                <input 
                    type="text" name="captcha" class=" @error('captcha') is-invalid @enderror" placeholder="Please Insert Captcha"
                >
                @error('captcha') <div class="error">Captcha tidak sesuai, mohon mengisi dengan benar!</div> @enderror 
            </section>

            <button class="basic-button bwe">Publish</button>
        </form>

        <livewire:public-comment :post-id="$post->id" :sort="$order ?? session('order')"/>
        {{-- @livewire('public-comment', ['postId' => $post->id], ['lazy' => true]) --}}
       </section>

        <section class="fcol g-1 blog-reference">

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

@push('modals')
    <!-- Modal PDF -->
    <div class="modal" id="modal-file" style="z-index:9999">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-black" id="title">Lihat File</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal Body with iframe -->
                <div class="modal-body">
                    <iframe src="" width="100%" height="400px" frameborder="0"></iframe>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tidak Setuju</button>
                    <a download href="https://site.smkn7-smr.sch.id/documents/surat_tatib.docx" class="btn btn-primary">Ya, Saya Setuju</a>
                </div>

            </div>
        </div>
    </div>
@endpush

@section('script')
<script>
    $(function() {
      $(document).on('click', '.btn-file', function() {
          const title = $(this).attr('data-title');
          const src = $(this).attr('data-src');

          $('#modal-file #title').html(title)
          $('#modal-file iframe').attr('src', src)
          $('#modal-file').modal('show')
      })
    });
</script>
@endsection