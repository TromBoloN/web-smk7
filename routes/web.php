<?php

use App\Http\Controllers\AuthController;
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

// Blog Public Routes
Route::get('/berita', [BlogPostController::class, 'public_Index'])->name('berita.index');
Route::get('/blogs/{slug}', [BlogPostController::class, 'show'])->name('berita.show');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/search', [BlogPostController::class, 'search'])->name('blog.search');

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
    Route::view('/', 'dashboard.admin')->name('admin');

    // Blog Routes
    Route::resource('/blogs', BlogPostController::class);
    Route::post('/ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.upload');

    // Guru Routes
    Route::resource('/teachers', GuruController::class);
});
