<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReplyController;
use Illuminate\Support\Facades\Route;
use App\Livewire\PostComponent;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/', [BlogController::class, 'index'])->name('home');
Route::get('/posts/{post:slug}', [BlogController::class, 'show'])->name('posts.show');
Route::post('/posts/{post:slug}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::post('/comments/{comment}/replies', [ReplyController::class, 'store'])->name('replies.store');
