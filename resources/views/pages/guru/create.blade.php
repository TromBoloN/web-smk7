@extends('layouts.admin')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Add New Guru</h2>

    <form action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="nama" class="block text-gray-700">Name:</label>
            <input type="text" name="nama" id="nama" required class="w-full p-2 border border-gray-300 rounded">
        </div>

        <div class="mb-4">
            <label for="mapel" class="block text-gray-700">Subject:</label>
            <input type="text" name="mapel" id="mapel" required class="w-full p-2 border border-gray-300 rounded">
        </div>

        <div class="mb-4">
            <label for="foto" class="block text-gray-700">Photo:</label>
            <input type="file" name="foto" id="foto" required class="w-full p-2 border border-gray-300 rounded">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="add-guru-button">Add Guru</button>
    </form>
@endsection
