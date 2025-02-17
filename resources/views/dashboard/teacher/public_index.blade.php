@extends('layouts.app')

@section('title', 'Guru SMKN 7')

@section('content')
<section class="teachers-list">
        @foreach ($gurus as $guru)
                
                <section class="teacher-container">
                    <div class="teacher-photo">
                        <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama }}">
                    </div>
                    <div class="teacher-info">
                        <h5 class="teacher-name">{{ $guru->nama }}</h5>
                        <p class="teacher-subject">{{ $guru->mapel }}</p>
                    </div>
                </section>
        @endforeach
</section>

@endsection