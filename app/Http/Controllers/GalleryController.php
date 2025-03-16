<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
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
        $validate = $request->validate([
            'caption' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:20480',
        ]);

        if ($request->hasFile('image')) {
            $validate['image'] = $request->file('image')->store('images/gallery', 'public');
        }

        Gallery::create(
            $validate
        );

        return redirect('admin/gallery')->with('success', 'Gallery\'s Image added successfully.');
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
        $validate = $request->validate([
            'caption' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:20480',
        ]);

        $gallery = Gallery::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($gallery->image) {
                Storage::disk('public')->delete($gallery->image);
            }

            $validate['image'] = $request->file('image')->store('images/gallery', 'public');
        }

        $gallery->update($validate);
        return redirect('admin/gallery')->with('success', 'Gallery\'s Image updated  successfully.');
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
        return redirect()->back()->with('success', 'Guru deleted successfully.');
    }
}
