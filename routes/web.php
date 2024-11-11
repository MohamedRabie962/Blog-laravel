<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\PostManager;

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


// routes/web.php


Route::get('/posts', PostManager::class)->name('posts.index');
