<?php

// app/Http/Controllers/BlogPostController.php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogPostController extends Controller
{

    public function homeIndex()
    {
        $posts = BlogPost::with('user')->latest()->take(4)->get();
        return view('home', compact('posts'));
    }


    public function publicIndex()
    {
        $posts = BlogPost::with('user')->latest()->paginate(10);
        return view('pages.blog.public_index', compact('posts'));
    }

    public function index()
    {
        $posts = BlogPost::with('user')->latest()->get();
        return view('pages.blog.index', compact('posts'));
    }

    public function create()
    {
        $users = User::all();
        return view('pages.blog.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'user_id' => 'required|exists:user,user_id',
            'category' => 'required|in:Berita Umum,Tak Berkategori',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $request->file('thumbnail') ? $request->file('thumbnail')->store('thumbnails', 'public') : null;

        BlogPost::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->user_id,
            'category' => $request->category,
            'thumbnail' => $path,
            'published_at' => $request->published_at,
        ]);

        return redirect()->route('blog.index')->with('success', 'Blog post added successfully.');
    }

    public function edit($post_id)
    {
        $post = BlogPost::findOrFail($post_id);
        $users = User::all();
        return view('pages.blog.edit', compact('post', 'users'));
    }

    public function update(Request $request, BlogPost $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'user_id' => 'required|exists:user,user_id',
            'category' => 'required|in:Berita Umum,Tak Berkategori',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($post->thumbnail) {
                Storage::disk('public')->delete($post->thumbnail);
            }
            $path = $request->file('thumbnail')->store('thumbnails', 'public');
            $post->thumbnail = $path;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = $request->user_id;
        $post->category = $request->category;
        $post->published_at = $request->published_at;
        $post->save();

        return redirect()->route('blog.index')->with('success', 'Blog post updated successfully.');
    }

    public function destroy(BlogPost $post)
    {
        if ($post->thumbnail) {
            Storage::disk('public')->delete($post->thumbnail);
        }
        $post->delete();

        return redirect()->route('blog.index')->with('success', 'Blog post deleted successfully.');
    }

    public function show($slug)
    {
        // Find the current post by slug
        $post = BlogPost::where('slug', $slug)->firstOrFail();

        // Get the latest 5 posts for the sidebar
        $posts = BlogPost::latest()->take(5)->get();

        // Pass both the current post and the recent posts to the view
        return view('pages.blog.show', compact('post', 'posts'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $posts = BlogPost::where('title', 'like', "%{$query}%")
            ->orWhere('content', 'like', "%{$query}%")->paginate(10);

        return view('pages.blog.search', compact('posts', 'query'));
    }

    public function blogs($slug)
    {
        // Find the post by slug
        $post = BlogPost::where('slug', $slug)->firstOrFail();

        // Get the latest 5 posts for the sidebar
        $posts = BlogPost::latest()->take(5)->get();

        // Pass both the current post and the recent posts to the view
        return view('pages.blog.show', compact('post', 'posts'));
    }
}
