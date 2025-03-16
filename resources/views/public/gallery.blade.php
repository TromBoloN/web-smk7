@extends('layouts.app')

@section('title', 'Foto Kegiatan Kami')
@section('style')
    <link rel="stylesheet" href="{{asset('css/gallery.css')}}">
@endsection

@section('content')
@include('layouts.hero', ['title' => 'Galeri Sekolah', 'subtitle' => 'Galeri foto-foto kegiatan Sekolah Kami'])
    
<!-- Gallery Modal -->
    <div class="darkness-backdrop-200" data-dark-backdrop></div>
        <div data-gallery-modal class="gallery-modal" style="display: none;">
        <div class="close-button offsite" data-close-side style="--size-close:30px">
            <i class="fa-solid fa-times"></i>
        </div>
        <img class="image-modal" src="" alt="">
        <div data-modal-caption></div>
    </div>

<div class="gallery">
@if ($gallery->count() > 0)
    @foreach ($gallery as $item)
    <div class="image" data-image-modal='{{$item->caption}}'>
        <img src="{{asset("storage/$item->image")}}" alt="{{$item->caption}}">
    </div>
    @endforeach
@else
    <div class='not-found-image-container'>
        <img class='not-found-data' src="{{ asset('images/not-found.png') }}" alt="">
    </div>
@endif
</div>

@section('script')
    <script src="{{ asset('js/modal.js') }}"></script>
@endsection

@endsection
