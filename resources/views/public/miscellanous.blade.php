@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="mt-extra fcol misc-container">
        <h5 class=" w-100 frow aicenter jccenter pb-10 entry-title">{{$title}}</h5>
        <div class="misc-content mt-20 mb-50">{!!$content!!}</div>
    </div>

@endsection
