<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'captcha' =>'required|captcha',
            'post_id' => 'required|exists:blog_post,id',
            'name' => 'required|string|max:20',
            'comment' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withFragment('comment-section')
                ->withErrors($validator)->withInput()->with([
                    'type' => 'danger','title' => 'Invalid Input', 'message' => 'Input yang Anda masukkan tidak sesuai, mohon coba lagi'
                ]);   
        } else{
            Comment::create($validator->validated());
        }

        return back()->withFragment('comment-section')->with([
            'type' => 'success','title' => 'Aksi Berhasil!', 'message' => 'Komentar berhasil ditambahkan!', 'order' => 'desc'
    ]);
    }
}
