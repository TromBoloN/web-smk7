<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
        $validate = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'mapel' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ], [
            'nama.required' => 'Nama guru tidak boleh kosong',
            'nama.string' => 'Nama guru harus berupa string',
            'nama.max' => 'Nama guru tidak boleh lebih dari :max karakter',
            'mapel.required' => 'Mata pelajaran tidak boleh kosong',
            'mapel.string' => 'Mata pelajaran harus berupa string',
            'mapel.max' => 'Mata pelajaran tidak boleh lebih dari :max karakter',
            'foto.required' => 'Foto guru tidak boleh kosong',
            'foto.mimes' => 'Foto guru harus berupa file dengan ekstensi jpeg, png, jpg, gif, atau webp',
            'foto.max' => 'Foto guru tidak boleh lebih dari 2MB',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput()->with([
                'type' => 'danger','title' => 'Invalid Input', 'message' => 'Input yang Anda masukkan tidak sesuai, mohon coba lagi'
            ]);
        }

        $data = $validate->validated();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('images/teachers', 'public');
        }

        Guru::create(
            $data
        );

        return redirect('admin/teachers')->with([
                'type' => 'success','title' => 'Input berhasil!', 'message' => 'Data berhasil ditambahkan!'
            ]
        );
    }

    public function edit($id)
    {
        $teacher = Guru::findOrFail($id);
        return view('dashboard.teacher.create', compact('teacher'));
    }

    public function update(Request $request, $id)
    {
        $validate =  Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'mapel' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ], [
            'nama.required' => 'Nama guru tidak boleh kosong',
            'nama.string' => 'Nama guru harus berupa string',
            'nama.max' => 'Nama guru tidak boleh lebih dari :max karakter',
            'mapel.required' => 'Mata pelajaran tidak boleh kosong',
            'mapel.string' => 'Mata pelajaran harus berupa string',
            'mapel.max' => 'Mata pelajaran tidak boleh lebih dari :max karakter',
            'foto.required' => 'Foto guru tidak boleh kosong',
            'foto.mimes' => 'Foto guru harus berupa file dengan ekstensi jpeg, png, jpg, gif, atau webp',
            'foto.max' => 'Foto guru tidak boleh lebih dari 2MB',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput()->with([
                'type' => 'danger','title' => 'Invalid Input', 'message' => 'Input yang Anda masukkan tidak sesuai, mohon coba lagi'
            ]);
        }

        $data = $validate->validated();

        $teacher = Guru::findOrFail($id);

        if ($request->hasFile('foto')) {
            if ($teacher->foto) {
                Storage::disk('public')->delete($teacher->foto);
            }

            $data['foto'] = $request->file('foto')->store('thumbnails', 'public');
        }

        $teacher->update($data);

        return redirect('admin/teachers')->with(
            [
                'type' => 'success','title' => 'Input berhasil!', 'message' => 'Data berhasil diubah!'
            ]
        );
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);

        if ($guru->foto) {
            Storage::disk('public')->delete($guru->foto);
        }

        $guru->delete();

        return redirect()->back()->with([
            'type' => 'success','title' => 'Data dihapus!', 'message' => 'Data berhasil dihapus!'
        ] );
    }

    public function showTeachers()
    {
        $gurus = Guru::all();
        return view('public.teacher.public_index', compact('gurus'));
    }
}
