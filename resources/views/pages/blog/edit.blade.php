@extends('layouts.admin')

@section('content')
<h2 class="text-2xl font-bold mb-4">Edit Blog Post</h2>
<form action="{{ route('blog.update', ['blog' => $post->post_id]) }}" method="POST" enctype="multipart/form-data">


    @csrf
    @method('PUT')
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" value="{{ $post->title }}" required class="form-control">
    </div>
    <div>
        <label for="content">Content</label>
        <textarea name="content" id="editor" required class="form-control">{{ $post->content }}</textarea>
    </div>
    <div>
        <label for="user_id">Author</label>
        <select name="user_id" required class="form-control">
            @foreach($users as $user)
                <option value="{{ $user->user_id }}" {{ $post->user_id == $user->user_id ? 'selected' : '' }}>
                    {{ $user->username }}
                </option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="category">Category</label>
        <select name="category" required class="form-control">
            <option value="Berita Umum" {{ $post->category == 'Berita Umum' ? 'selected' : '' }}>Berita Umum</option>
            <option value="Tak Berkategori" {{ $post->category == 'Tak Berkategori' ? 'selected' : '' }}>Tak Berkategori</option>
        </select>
    </div>
    <div>
        <label for="thumbnail">Thumbnail</label>
        <input type="file" name="thumbnail" class="form-control-file">
        @if ($post->thumbnail)
            <img src="{{ asset('storage/' . $post->thumbnail) }}" width="100" height="100" alt="Current Thumbnail">
        @endif
    </div>
    <button type="submit" class="btn btn-primary mt-4">Update Blog Post</button>
</form>

<!-- Add CKEditor script -->
<script src="https://cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor', {
        extraPlugins: 'justify',
        filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token() ]) }}",
        filebrowserUploadMethod: 'form'
    });
</script>
@endsection
