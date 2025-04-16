<?php

// app/Http/Controllers/BlogPostController.php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BlogPostController extends Controller
{

    public function public_Index()
    {
        $later = BlogPost::with('user')->latest()->take(5)->get(); // Get the absolute newest one
        $post_category = BlogPost::distinct()->pluck('category');

        $editors_choice =
        BlogPost::with('user')->where('is_editors_choice', true)
        ->take(4)
        ->get();

        $first_choice = $editors_choice->shift();
        $other_choice = $editors_choice;

        $categories = BlogPost::whereIn('category', $post_category)->get()->groupBy('category');
        $blog_categories = $categories->map(function($item){
            return $item->take(3);
        });

        return view('public.blog.public_index', compact('later','post_category','first_choice', 'other_choice', 'blog_categories'));
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
        $order = session()->has('order') ? 'desc': 'asc';

        // Pass both the current post and the recent posts to the view
        return view('public.blog.show', compact('post', 'posts', 'post_category', 'order'));
    }

    public function create()
    {
        $users = User::all();
        return view('dashboard.blog.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'is_editors_choice' => 'nullable|boolean',
            'category' => 'required|in:Berita Umum,Tak Berkategori',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title.required' => 'Judul tidak boleh kosong',
            'title.string' => 'Judul harus berupa string',
            'title.max' => 'Judul tidak boleh lebih dari :max karakter',
            'content.required' => 'Isi berita tidak boleh kosong',
            'content.string' => 'Isi berita harus berupa string',
            'user_id.required' => 'User ID tidak boleh kosong',
            'user_id.exists' => 'User ID tidak valid',
            'is_editors_choice.boolean' => 'Pilihan editor harus berupa boolean',
            'category.required' => 'Kategori tidak boleh kosong',
            'category.in' => 'Kategori tidak valid',
            'thumbnail.image' => 'Thumbnail harus berupa gambar',
            'thumbnail.mimes' => 'Thumbnail harus berupa file dengan ekstensi jpeg, png, jpg, atau gif',
            'thumbnail.max' => 'Thumbnail tidak boleh lebih dari 2MB',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput()->with([
                'type' => 'danger','title' => 'Invalid Input', 'message' => 'Input yang Anda masukkan tidak sesuai, mohon coba lagi'
            ]);
        }

        $data = $validate->validated();

        $editors_checker = BlogPost::where('is_editors_choice', 1)->get();
        if($editors_checker->count() >= 4){
            $editors_checker->sortBy('updated_at')->first()->update(['is_editors_choice'=> 0]);
        }

        if(!$request->is_editors_choice){
            $data['is_editors_choice'] = false;
        }

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $create = BlogPost::create(
            $data
        );

        return redirect('admin/blogs')->with( 
            [
                'type' => 'success','title' => 'Input berhasil!', 'message' => 'Data berhasil ditambahkan!'
            ]
        );
    }

    public function edit($post_id)
    {
        $post = BlogPost::findOrFail($post_id);
        $users = User::all();
        return view('dashboard.blog.create', compact('post', 'users'));
    }

    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'category' => 'required|in:Berita Umum,Tak Berkategori',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title.required' => 'Judul tidak boleh kosong',
            'title.string' => 'Judul harus berupa string',
            'title.max' => 'Judul tidak boleh lebih dari :max karakter',
            'content.required' => 'Isi berita tidak boleh kosong',
            'content.string' => 'Isi berita harus berupa string',
            'user_id.required' => 'User ID tidak boleh kosong',
            'user_id.exists' => 'User ID tidak valid',
            'is_editors_choice.boolean' => 'Pilihan editor harus berupa boolean',
            'category.required' => 'Kategori tidak boleh kosong',
            'category.in' => 'Kategori tidak valid',
            'thumbnail.image' => 'Thumbnail harus berupa gambar',
            'thumbnail.mimes' => 'Thumbnail harus berupa file dengan ekstensi jpeg, png, jpg, atau gif',
            'thumbnail.max' => 'Thumbnail tidak boleh lebih dari 2MB',
        ]);


        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput()->with([
                'type' => 'danger','title' => 'Invalid Input', 'message' => 'Input yang Anda masukkan tidak sesuai, mohon coba lagi'
            ]);
        }

        $data = $validate->validated();

        $editors_checker = BlogPost::where('is_editors_choice', 1)->get();
        if($editors_checker->count() >= 4){
            $editors_checker->sortBy('updated_at')->first()->update(['is_editors_choice'=> 0]);
        }

        if(!$request->is_editors_choice){
            $data['is_editors_choice'] = false;
        }else{
            $data['is_editors_choice'] = true;
        }

        $post = BlogPost::findOrFail($id);

        if ($request->hasFile('thumbnail')) {
            if ($post->thumbnail) {
                Storage::disk('public')->delete($post->thumbnail);
            }

            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

          $post->update($data);

        return redirect('admin/blogs')->with( 
            [
                'type' => 'success','title' => 'Input berhasil!', 'message' => 'Data berhasil diubah!'
            ]
        );
    }

    public function destroy($id)
    {
        $post = BlogPost::findOrFail($id);

        if ($post->thumbnail) {
            Storage::disk('public')->delete($post->thumbnail);
        }

        $post->delete();

        return redirect()->back()->with([
            'type' => 'success','title' => 'Data dihapus!', 'message' => 'Data berhasil dihapus!'
        ] 
    );
    }
}
