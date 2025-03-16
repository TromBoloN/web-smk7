@extends('layouts.app')

@section('title', 'Guru SMKN 7')
@section('style')
    <link rel="stylesheet" href="{{asset('css/guru.css')}}">
@endsection
@section('content')
@include('layouts.hero', ['title' => 'Guru - Guru Kami'])

@livewire('public-teacher')

@endsection

