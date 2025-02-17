<?php

// app/Http/Controllers/BlogPostController.php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogPostController extends Controller
{

    public function public_Index()
    {
        $posts = BlogPost::with('user')->latest()->paginate(10);
        return view('dashboard.blog.public_index', compact('posts'));
    }

    public function index()
    {
        $posts = BlogPost::with('user')->latest()->get();
        info($posts);
        return view('dashboard.blog.index', compact('posts'));
    }

    public function show($slug)
    {
        // Find the current post by slug
        $post = BlogPost::where('slug', $slug)->firstOrFail();

        $posts = BlogPost::where('id', '!=', $post->id)->latest()->take(5)->get();

        // Pass both the current post and the recent posts to the view
        return view('dashboard.blog.show', compact('post', 'posts'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $posts = BlogPost::where('title', 'like', "%{$query}%")
            ->orWhere('content', 'like', "%{$query}%")->paginate(10);

        return view('dashboard.blog.search', compact('posts', 'query'));
    }

    public function create()
    {
        $users = User::all();
        return view('dashboard.blog.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'category' => 'required|in:Berita Umum,Tak Berkategori',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            $validate['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $create = BlogPost::create(
            $validate
        );

        return redirect('admin/blogs')->with('success', 'Blog post added successfully.');
    }

    public function edit($post_id)
    {
        $post = BlogPost::findOrFail($post_id);
        $users = User::all();
        return view('dashboard.blog.create', compact('post', 'users'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'category' => 'required|in:Berita Umum,Tak Berkategori',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $post = BlogPost::findOrFail($id);

        if ($request->hasFile('thumbnail')) {
            if ($post->thumbnail) {
                Storage::disk('public')->delete($post->thumbnail);
            }

            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

          $post->update($validated);

        return redirect('admin/blogs')->with('success', 'Blog post updated successfully.');
    }

    public function destroy($id)
    {
        $post = BlogPost::findOrFail($id);

        if ($post->thumbnail) {
            Storage::disk('public')->delete($post->thumbnail);
        }

        $post->delete();

        return redirect()->back()->with('success', 'Blog post deleted successfully.');
    }
}
