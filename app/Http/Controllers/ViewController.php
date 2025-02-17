<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function home(){
        $posts = BlogPost::with('user')->latest()->take(4)->get();
        return view('home', compact('posts'));
    }
}
