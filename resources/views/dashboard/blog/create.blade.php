@extends('dashboard.admin')

@section('content')
<section class="dashboard-main-header">
    <h1>Form Blog</h1>
    <a href="{{url('admin/blogs')}}">Preview</a>
</section>

    <form action="{{ request()->is('*edit*') ? url("admin/blogs/$post->id") : url("admin/blogs") }}" method="POST" class="form-basic" enctype="multipart/form-data">
        @csrf

        @if ( request()->is('*edit*') )
            @method('PUT')
        @endif

        <div class="form-child">
            <label for="foto" class="block text-gray-700">Thumbnail</label>

            <div class="form-image-upload-container a-16-9">
                <img  
                    src='{{ isset($post->thumbnail) ? asset("storage/$post->thumbnail") : ''}}' class="form-image-preview"
                    style="{{isset($post->thumbnail) ? 'display: block' : ''}}"
                >

                <section class="fcol form-image-information">
                    <img src="{{asset('images/upload-icon.png')}}" alt="" width="70">
                    
                    <section class="fcol">
                        <h5>Drop your image here, or browse</h2>
                        <h6>Supports : JPEG, PNG</h6>
                    </section>

                </section>
                
                {{-- <input type="hidden" name="value-preview" class="value-preview"> --}}
                <input type="file" name="thumbnail" {{isset($post->thumbnail) ? '' : 'required'}} class="form-image-upload">
            </div>
            
            @error('thumbnail')
                <div class="error">{{$message}}</div>
            @enderror
        </div>

        <div class="form-child">
            <label for="nama" class="">Title</label>
            <input type="text" name="title" required class="w-full p-2 border rounded" value="{{ old('title') ?? ($post->title ?? '') }}" >
            @error('title')
                <div class="error">{{$message}}</div>
            @enderror
        </div>

        @php
            $opt_category = ['Berita Umum', 'Tak Berkategori'];
        @endphp
        <div class="form-child">
            <label for="category">Category</label>
            <select name="category" required class="form-control">
                    @for ($i = 0; $i < count($opt_category); $i++)
                        <option 
                        @if( isset($post->category) && old('category') == null)
                            {{$post->category == $opt_category[$i]  ? 'selected' : ''}}
                        @else
                            {{old('category') == $opt_category[$i] ? 'selected' : ''}}
                        @endif

                        value="{{$opt_category[$i]}}">{{$opt_category[$i]}}</option>
                    @endfor
            </select>
        </div>

        <div class="form-child">
            <label for="user_id">Author</label>
            <select name="user_id" required class="form-control">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->username }}</option>
                @endforeach
            </select>
        </div>
        @error('user_id')
            <div class="error">{{$message}}</div>
        @enderror

        <div class="form-child frow">
            
            <label for="is_editors_choice" class="">
                <span>Editor's Choice</span>
                <input 

                @if (isset($post->is_editors_choice) && old('title') == null)
                     {{$post->is_editors_choice == 1 ? 'checked' : ''}} 
                @else
                    {{old('is_editors_choice') == 1 ? 'checked' : ''}}
                @endif  
                
                name="is_editors_choice" id="is_editors_choice" type="checkbox" placeholder="Editor's Choice" class="w-full p-2 border rounded" value="1">
                <span class="check"><i class="fa-solid fa-check"></i></span>
            </label>

        </div>
        <h6>* Editor's choice dibatasi sampai 4, jika lebih, Editor's choice yang terlama akan di singkirkan otomatis</h6>
        @error('editors_choice')
            <div class="error">{{$message}}</div>
        @enderror

        <div class="form-child">
            <label for="mapel" class="block text-gray-700">Content</label>
            <textarea name="content" id="editor" required class="form-control" rows="10">{{ old('content') ?? ($post->content ?? '') }}</textarea>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="form-submit">{{ request()->is('*edit*') ? 'Ubah Blog': 'Tambah Blog'}}</button>

    </form>
    

    <!-- Add CKEditor CDN script -->
    <script src="{{url('js/image-upload.js')}}"></script>
    <script src="https://cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor', {
            extraPlugins: 'justify', 
            filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token() ]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
