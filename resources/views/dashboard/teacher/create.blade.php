@extends('dashboard.admin')

@section('content')

<section class="dashboard-main-header">
    <h1>Form Guru</h1>
    <a href="{{url('admin/teachers')}}">Preview</a>
</section>

    <form action="{{ request()->is('*edit*') ? url("admin/teachers/$teacher->guru_id") : url("admin/teachers") }}"  method="POST" class="form-basic" enctype="multipart/form-data">
        @csrf

        @if ( request()->is('*edit*') )
            @method('PUT')
        @endif

        <div class="form-child">
            <label for="foto" class="block text-gray-700">Photo</label>

            <div class="form-image-upload-container a-4-3">
                <img  
                    src='{{ isset($teacher->foto) ? asset("storage/$teacher->foto") : ''}}' class="form-image-preview"
                    style="{{isset($teacher->foto) ? 'display: block' : ''}}"
                >

                <section class="fcol form-image-information">
                    <img src="{{asset('images/upload-icon.png')}}" alt="" width="70">
                    
                    <section class="fcol">
                        <h5>Drop your image here, or browse</h2>
                        <h6>Req : Transparent BG, 4:3, PNG, JPG</h6>
                    </section>

                </section>

                <input type="file" name="foto" id="foto" {{isset($teacher->foto) ? '' : 'required'}} class="form-image-upload">
            </div>
            
            @error('foto')
                <div class="error">{{$message}}</div>
            @enderror
        </div>

        <div class="form-child">
            <label for="nama" class="">Name</label>
            <input type="text" name="nama" id="nama" required class="w-full p-2 border rounded" value="{{ old('nama') ?? ($teacher->nama ?? '') }}">
            @error('nama')
                <div class="error">{{$message}}</div>
            @enderror
        </div>

        <div class="form-child">
            <label for="mapel" class="block text-gray-700">Subject</label>
            <input type="text" name="mapel" id="mapel" required class="w-full p-2 border rounded" value="{{ old('mapel') ?? ($teacher->mapel ?? '') }}">
            @error('mapel')
                <div class="error">{{$message}}</div>
            @enderror
        </div>

        <!-- Submit Button -->
    <button type="submit" class="form-submit">{{ request()->is('*edit*') ? 'Ubah Guru': 'Tambah Guru'}}</button>

    </form>

    <script src="{{url('js/image-upload.js')}}"></script>
@endsection
