@extends('layouts.app')

@section('title', 'Guru SMKN 7')

@section('content')
<section class="teachers-list">
    <div class="container">
        <div class="row-wrapper"> 
            <div class="row">
                @foreach ($gurus as $guru)
                    <div class="teacher-card">
                        <div class="teacher-photo">
                            <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama }}">
                        </div>
                        <div class="teacher-info">
                            <h3 class="teacher-name">{{ $guru->nama }}</h3>
                            <p class="teacher-subject">{{ $guru->mapel }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <a href="#" class="teachers-load-more">
            <span>Load More<i class="fa-solid fa-angle-down" aria-hidden="true"></i></span>
        </a>
    </div>
</section>

@endsection
