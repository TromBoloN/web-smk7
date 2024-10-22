@extends('layouts.admin')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Add Blog Post</h2>
    <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" required class="form-control form-control-lg" placeholder="Enter blog title">
        </div>

        <div>
            <label for="content">Content</label>
            <textarea name="content" id="editor" required class="form-control" rows="10"></textarea>
        </div>

        <div>
            <label for="user_id">Author</label>
            <select name="user_id" required class="form-control">
                @foreach($users as $user)
                    <option value="{{ $user->user_id }}">{{ $user->username }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="category">Category</label>
            <select name="category" required class="form-control">
                <option value="Berita Umum">Berita Umum</option>
                <option value="Tak Berkategori">Tak Berkategori</option>
            </select>
        </div>

        <div>
            <label for="thumbnail">Thumbnail</label>
            <input type="file" name="thumbnail" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary mt-4">Add Blog Post</button>
    </form>

    <!-- Add CKEditor CDN script -->
    <script src="https://cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor', {
            extraPlugins: 'justify', 
            filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token() ]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
