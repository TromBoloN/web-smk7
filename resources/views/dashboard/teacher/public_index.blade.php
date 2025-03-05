@extends('layouts.app')

@section('title', 'Guru SMKN 7')

@section('content')
<h2 class="head-teacher">Guru Kami</h2>
<section class="teachers-list">
        @foreach ($gurus as $guru)
                
                <section class="teacher-container">

                    <div class="background-teacher">
                        <img src="{{asset('images/Background-teacher.png')}}" alt="">
                    </div>
                    <div class="teacher-photo">
                        <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama }}">
                    </div>

                    <h5 class="teacher-name disguise">{{ $guru->nama }}</h5>
                    <section class="teacher-info">
                        <h5 class="teacher-name">{{ $guru->nama }}</h5>
                        <p class="teacher-subject">{{ $guru->mapel }}</p>
                    </section>

                </section>
        @endforeach
</section>

@endsection

