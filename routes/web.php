<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>['auth']],function(){

    Route::get('/posts',[PostController::class, 'index'])->name(name:'posts.index');

    Route::get('/posts/create',[PostController::class, 'create'])->name(name:'posts.create');

    Route::post('/posts',[PostController::class, 'store'])->name(name:'posts.store');

    Route::get('/posts/{post}',[PostController::class, 'show'])->name(name:'posts.show');

    Route::get('/posts/{post}/edit',[PostController::class, 'edit'])->name(name:'posts.edit');

    Route::put('/posts/{post}',[PostController::class, 'update'])->name(name:'posts.update');

    Route::delete('/posts/{post}',[PostController::class , 'destroy'])->name(name: 'posts.destroy');

});
Route::get('/posts/comments/{comment}',[PostController::class, 'show']);
Route::post('/posts/comments',[CommentController::class, 'store']);
Route::delete('/posts/comments/{comment}',[CommentController::class , 'destroy'])->name(name:'comments.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//github
Route::get('/auth/redirect', function(){return Socialite::driver('github')->redirect();});
Route::get('/auth/callback', function(){$user = Socialite::driver('github')->user();});
//gmail
Route::get('auth/google', [LoginController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);