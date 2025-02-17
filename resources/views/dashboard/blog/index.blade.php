@extends('dashboard.admin')

@section('content')
    <section class="dashboard-main-header">
        <h1>Data Blog</h1>
        <a href="{{ url('admin/blogs/create') }}">Tambah</a>
    </section>

    <section class="table-scroll">

        <table class="data-table">
            <tr>
                <th>No.</th>
                <th>Thumbnail</th>
                <th>Title</th>
                <th>Author</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>

            @php
                $no = 1;
            @endphp
            @forelse ($posts as $post)
                <tr>
                    <td>{{ $no }}</td>
                    <td><img src="{{ asset("storage/$post->thumbnail")}}" alt=""></td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post['user']['username'] }}</td>
                    <td>{{ $post->category }}</td>
                    <td><i class="fa-solid fa-ellipsis tabz-open" data-tabz-dropdown-open='{{$post->id}}'></i></td>
                </tr>
                @php
                    $no++;
                @endphp
            @empty
                {{-- <tr><td>Not Found</td></tr> --}}
            @endforelse

        </table>
    </section>

    <div class="tabz-dropdown-menu" data-tabz-dropdown-menu>
                                
        <div class="tabz-dropdown-item-contain">
            <a class="tabz-dropdown-item" data-tabz-edit href="{{url("admin/blogs/0/edit")}}"> 
                <i class="fa-solid fa-pencil"></i> <span>Edit</span>
            </a>
        </div>

        <form class="tabz-dropdown-item-contain" data-tabz-del action="{{"/admin/blogs/0"}}" method="post"> @method('DELETE') @csrf
            <button class="tabz-dropdown-item">
                <i class="fa-solid fa-trash-can"></i> 
                <span>Delete</span>
            </button>
        </form>

    </div>

@endsection
