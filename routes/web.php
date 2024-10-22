<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\CommentController;

// Public Routes
Route::get('/', [BlogPostController::class, 'homeIndex'])->name('home');

// Blog Public Routes
Route::get('/berita', [BlogPostController::class, 'publicIndex'])->name('berita.index');
Route::get('/berita/{slug}', [BlogPostController::class, 'show'])->name('berita.show');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/search', [BlogPostController::class, 'search'])->name('blog.search');

// Teacher's Public Routes
Route::get('/teachers', [GuruController::class, 'showTeachers'])->name('teachers.list');

// Auth Routes
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin Routes 
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::view('/', 'layouts.admin')->name('admin');

    // Blog Routes
    Route::resource('blog', BlogPostController::class);
    Route::post('/ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.upload');

    // Guru Routes
    Route::resource('guru', GuruController::class);
});
