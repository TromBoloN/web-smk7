<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = Guru::all();
        return view('pages.guru.index', compact('gurus'));
    }

    public function create()
    {
        return view('pages.guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'mapel' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:20480',
        ]);

        $path = $request->file('foto')->store('images', 'public');

        Guru::create([
            'nama' => $request->nama,
            'mapel' => $request->mapel,
            'foto' => $path,
        ]);

        return redirect()->route('guru.index')->with('success', 'Guru added successfully.');
    }

    public function edit(Guru $guru)
    {
        return view('pages.guru.edit', compact('guru'));
    }

    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'mapel' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
                Storage::disk('public')->delete($guru->foto);
            }

            $path = $request->file('foto')->store('images', 'public');
            $guru->foto = $path;
        }

        $guru->nama = $request->nama;
        $guru->mapel = $request->mapel;
        $guru->save();

        return redirect()->route('guru.index')->with('success', 'Guru updated successfully.');
    }

    public function destroy(Guru $guru)
    {
        if ($guru->foto) {
            Storage::disk('public')->delete($guru->foto);
        }
        $guru->delete();

        return redirect()->route('guru.index')->with('success', 'Guru deleted successfully.');
    }

    public function showTeachers()
    {
        $gurus = Guru::all();
        return view('pages.teachers', compact('gurus'));
    }
}
