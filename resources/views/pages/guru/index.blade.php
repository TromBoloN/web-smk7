@extends('layouts.admin')

@section('content')
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-2xl font-bold">Guru List</h2>
        <a href="{{ route('guru.create') }}" class="button button-blue">Add Guru</a>
        <a href="{{ route('home') }}" class="button button-blue">Home</a>
    </div>

    <table class="w-full mt-4 border-collapse border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Subject</th>
                <th class="border px-4 py-2">Photo</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gurus as $guru)
                <tr>
                    <td class="border px-4 py-2">{{ $guru->nama }}</td>
                    <td class="border px-4 py-2">{{ $guru->mapel }}</td>
                    <td class="border px-4 py-2">
                        <!-- Clickable Thumbnail -->
                        <a href="{{ asset('storage/' . $guru->foto) }}" target="_blank">
                            <img src="{{ asset('storage/' . $guru->foto) }}" width="30" height="30" alt="Guru Photo" class="rounded-full border border-gray-300">
                        </a>
                    </td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('guru.edit', $guru->guru_id) }}" class="button button-yellow">Edit</a>
                        <form action="{{ route('guru.destroy', $guru->guru_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button button-red">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
