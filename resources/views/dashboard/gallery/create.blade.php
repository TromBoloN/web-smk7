@extends('dashboard.admin')

@section('content')

<section class="dashboard-main-header">
    <h1>Form Gallery</h1>
    <a href="{{url('admin/gallery')}}">Preview</a>
</section>

    <form action="{{ request()->is('*edit*') ? url("admin/gallery/$gallery->id") : url("admin/gallery") }}"  method="POST" class="form-basic" enctype="multipart/form-data">
        @csrf

        @if ( request()->is('*edit*') )
            @method('PUT')
        @endif

        <div class="form-child">
            <label for="image" class="block text-gray-700">Gambar</label>

            <div class="form-image-upload-container a-16-9">
                <img  
                    src='{{ isset($gallery->image) ? asset("storage/$gallery->image") : ''}}' class="form-image-preview"
                    style="{{isset($gallery->image) ? 'display: block' : ''}}"
                >

                <section class="fcol form-image-information">
                    <img src="{{asset('images/upload-icon.png')}}" alt="" width="70">
                    
                    <section class="fcol">
                        <h5>Drop your image here, or browse</h2>
                        <h6>Req : PNG, JPG, JPEG, WEBP, Max: 2MB</h6>
                    </section>

                </section>

                <input type="file" name="image" id="image" {{isset($gallery->image) ? '' : 'required'}} class="form-image-upload">
            </div>
            
        </div>

        <div class="form-child">
            <label for="caption" class="">Caption</label>
            <input type="text" name="caption" id="caption" required class="w-full p-2 border rounded" value="{{$gallery->caption ?? ''}}">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="form-submit">{{ request()->is('*edit*') ? 'Ubah Data': 'Tambah Data'}}</button>
    </form>

    <script src="{{url('js/image-upload.js')}}"></script>
@endsection
