<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gallery = Gallery::all();
        return view('dashboard.gallery.index', compact('gallery'));
    }

    public function public_index()
    {
        $gallery = Gallery::all();
        return view('public.gallery', compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'caption' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ], [
            'caption.required' => 'Caption tidak boleh kosong',
            'caption.string' => 'Caption harus berupa string',
            'caption.max' => 'Caption tidak boleh lebih dari :max karakter',
            'image.required' => 'Gambar tidak boleh kosong',
            'image.mimes' => 'Gambar harus berupa file dengan ekstensi jpeg, png, jpg, gif, atau webp',
            'image.max' => 'Gambar tidak boleh lebih dari 5MB',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput()->with([
                'type' => 'danger','title' => 'Invalid Input', 'message' => 'Input yang Anda masukkan tidak sesuai, mohon coba lagi'
            ]);
        }

        $data = $validate->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images/gallery', 'public');
        }

        Gallery::create(
            $data
        );

        return redirect('admin/gallery')->with(
            [
                'type' => 'success','title' => 'Input berhasil!', 'message' => 'Data berhasil ditambahkan!'
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('dashboard.gallery.create', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'caption' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:20480',
        ], [
            'caption.required' => 'Caption tidak boleh kosong',
            'caption.string' => 'Caption harus berupa string',
            'caption.max' => 'Caption tidak boleh lebih dari :max karakter',
            'image.required' => 'Gambar tidak boleh kosong',
            'image.mimes' => 'Gambar harus berupa file dengan ekstensi jpeg, png, jpg, gif, atau webp',
            'image.max' => 'Gambar tidak boleh lebih dari 5MB',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput()->with([
                'type' => 'danger','title' => 'Invalid Input', 'message' => 'Input yang Anda masukkan tidak sesuai, mohon coba lagi'
            ]);
        }

        $data = $validate->validated();

        $gallery = Gallery::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($gallery->image) {
                Storage::disk('public')->delete($gallery->image);
            }

            $data['image'] = $request->file('image')->store('images/gallery', 'public');
        }

        $gallery->update($data);
        return redirect('admin/gallery')->with(            [
            'type' => 'success','title' => 'Input berhasil!', 'message' => 'Data berhasil ditambahkan!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $guru = Gallery::findOrFail($id);

        if ($guru->image) {
            Storage::disk('public')->delete($guru->image);
        }

        $guru->delete();
        return redirect()->back()->with([
            'type' => 'success','title' => 'Input berhasil!', 'message' => 'Data berhasil ditambahkan!'
        ]);
    }
}
