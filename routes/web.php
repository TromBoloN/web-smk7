<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\CommentController;

// Public Routes
Route::get('/', [ViewController::class, 'home']);
Route::get('/sejarah-singkat', [ViewController::class, 'short_history']);
Route::get('/sejarah-pengembangan', [ViewController::class, 'development_history']);
Route::get('/visi-dan-misi', [ViewController::class, 'vision_mission']);
Route::get('/program-keahlian', [ViewController::class, 'vocational_major']);
Route::get('/gallery', [GalleryController::class, 'public_index']);

Route::prefix('konsentrasi-keahlian')->group(function (){
    Route::get('/teknik-jaringan-komputer-dan-telekomunikasi', [ViewController::class, 'tjkt']);
    Route::get('/pengembangan-perangkat-lunak-dan-gim', [ViewController::class, 'pplg']);
    Route::get('/desain-komunikasi-visual', [ViewController::class, 'dkv']);
});

Route::prefix('sarana-prasarana')->group(function (){
    Route::get('/infrastruktur', [ViewController::class, 'infra']);
    Route::get('/pembelajaran', [ViewController::class, 'bljr']);
});

Route::get('/tugas-dan-tujuan', [ViewController::class, 'program_characteristic']);
Route::get('/hubungan-industri', [ViewController::class, 'hubungan_industri']);

// Blog Public Routes
Route::get('/blogs', [BlogPostController::class, 'public_Index'])->name('berita.index');
Route::get('/blogs/detail/{slug}', [BlogPostController::class, 'show'])->name('berita.show');
Route::get('/blogs/category/{category}', [BlogPostController::class, 'category']);
Route::get('/blogs/search', [BlogPostController::class, 'search']);
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

// Teacher's Public Routes
Route::get('/teachers', [GuruController::class, 'showTeachers'])->name('teachers.list');

// Auth Routes
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [AuthController::class, 'form'])->name('login');
Route::post('/auth', [AuthController::class, 'login'])->name('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes 
Route::middleware(['role:4'])->prefix('admin')->group(function () {
    Route::view('/', 'dashboard.index')->name('admin');

    // Blog Routes
    Route::resource('/blogs', BlogPostController::class);
    Route::post('/ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.upload');

    // Guru Routes
    Route::resource('/teachers', GuruController::class);

    // Gallery Routes
    Route::resource('/gallery', GalleryController::class);
});
