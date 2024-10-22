@extends('layouts.admin')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Guru</h2>
    <form action="{{ route('guru.update', $guru->guru_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="nama">Name</label>
            <input type="text" name="nama" value="{{ $guru->nama }}" required class="w-full p-2 border">
        </div>
        <div>
            <label for="mapel">Subject</label>
            <input type="text" name="mapel" value="{{ $guru->mapel }}" required class="w-full p-2 border">
        </div>
        <div>
            <label for="foto">Photo</label>
            <input type="file" name="foto" class="w-full p-2 border">
            <p>Current Photo:</p>
            <img src="{{ asset('storage/' . $guru->foto) }}" width="100" height="100">
        </div>
        <button type="submit" class="button button-blue mt-4">Update Guru</button>
    </form>
@endsection
