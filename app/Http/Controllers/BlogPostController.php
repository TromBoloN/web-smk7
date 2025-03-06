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
        $later = BlogPost::with('user')->latest()->take(5)->get(); // Get the absolute newest one
        $editors_choice = BlogPost::with('user')->where('is_editors_choice', true)->take(3)->get(); // Get the absolute newest one
        $related = null;
        $first_related = null;
        $other_related = null;
        $post_category = BlogPost::all()->pluck('category')->unique();
        
        if($later->isNotEmpty()){
            $related = BlogPost::with('user')
            ->where('category', $later->first()->category) // Match category
            ->where('id', '!=', $later->first()->id) // Exclude the latest post itself
            ->take(4)
            ->get();

        $first_related = $related->shift();
        $other_related = $related;
        }
        

        return view('public.blog.public_index', compact('later','post_category','first_related', 'other_related', 'editors_choice', 'related'));
    }

    public function category($category){
        $posts = BlogPost::with('user')->where('category', $category)->latest()->paginate(6);
        $post_category = BlogPost::all()->pluck('category')->unique();

        if($posts->isEmpty()){
            abort(404);
        }
        
        return view('public.blog.category_index', compact('posts','post_category', 'category'));

    }

    public function index()
    {
        $posts = BlogPost::with('user')->latest()->get();
        return view('dashboard.blog.index');
    }

    public function search(Request $request)
    {

        $query = $request->input('query');
        $post_category = BlogPost::all()->pluck('category')->unique();

        $posts = BlogPost::where('title', 'like', "%{$query}%")
            ->orWhere('content', 'like', "%{$query}%")->paginate(6)->withQueryString();

        return view('public.blog.search', compact('posts','post_category', 'query'));
    }

    public function show($slug)
    {
        // Find the current post by slug
        $post = BlogPost::where('slug', $slug)->firstOrFail();
        $posts = BlogPost::where('id', '!=', $post->id)->latest()->take(5)->get();
        $post_category = BlogPost::all()->pluck('category')->unique();

        // Pass both the current post and the recent posts to the view
        return view('public.blog.show', compact('post', 'posts', 'post_category'));
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
            'is_editors_choice' => 'nullable|boolean',
            'category' => 'required|in:Berita Umum,Tak Berkategori',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if(!$request->is_editors_choice){
            $validated['is_editors_choice'] = false;
        }

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

        if(!$request->is_editors_choice){
            $validated['is_editors_choice'] = false;
        }else{
            $validated['is_editors_choice'] = true;
        }

        info($validated);

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
