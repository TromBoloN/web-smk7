<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CKEditorController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $path = $request->file('upload')->store('images', 'public');

            $url = Storage::url($path);

            return response()->json([
                'uploaded' => 1,
                'fileName' => $request->file('upload')->getClientOriginalName(),
                'url' => $url
            ]);
        }
        return response()->json(['uploaded' => 0, 'error' => ['message' => 'Upload failed']]);
    }
}
