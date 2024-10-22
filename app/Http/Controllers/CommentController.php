<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'post_id' => 'required|exists:blog_post,post_id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|string',
            'website' => 'nullable|url',
        ]);

        Comment::create([
            'post_id' => $validatedData['post_id'],
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'comment' => $validatedData['comment'],
            'website' => $validatedData['website'] ?? null,
        ]);

        return back()->with('success', 'Your comment has been posted successfully!');
    }
}
