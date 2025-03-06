<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index()
    {
        $teachers = Guru::all();
        return view('dashboard.teacher.index', compact('teachers'));
    }

    public function create()
    {
        return view('dashboard.teacher.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|string|max:255',
            'mapel' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:20480',
        ]);

        if ($request->hasFile('foto')) {
            $validate['foto'] = $request->file('foto')->store('images/teachers', 'public');
        }

        Guru::create(
            $validate
        );

        return redirect('admin/teachers')->with('success', 'Guru added successfully.');
    }

    public function edit($id)
    {
        $teacher = Guru::findOrFail($id);
        return view('dashboard.teacher.create', compact('teacher'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required|string|max:255',
            'mapel' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $teacher = Guru::findOrFail($id);

        if ($request->hasFile('foto')) {
            if ($teacher->foto) {
                Storage::disk('public')->delete($teacher->foto);
            }

            $validate['foto'] = $request->file('foto')->store('thumbnails', 'public');
        }

        $teacher->update($validate);
        return redirect('admin/teachers')->with('success', 'Guru updated successfully.');
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);

        if ($guru->foto) {
            Storage::disk('public')->delete($guru->foto);
        }

        $guru->delete();

        return redirect()->back()->with('success', 'Guru deleted successfully.');
    }

    public function showTeachers()
    {
        $gurus = Guru::all();
        return view('public.teacher.public_index', compact('gurus'));
    }
}
