<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//1.index to display all records
Route::get('/posts',[PostController::class, 'index'])->name(name:'posts.index');

//2.(a)create to display adding new record page
Route::get('/posts/create',[PostController::class, 'create'])->name(name:'posts.create');

//3.(b-saving a-2 step)Store to save this new record
Route::post('/posts',[PostController::class, 'store'])->name(name:'posts.store');

//4.show to display specific record using id
Route::get('/posts/{post}',[PostController::class, 'show'])->name(name:'posts.show');

//5.(a)edit to edit specific record using id
Route::get('/posts/{post}/edit',[PostController::class, 'edit'])->name(name:'posts.edit');

//6.(b-saving a-5 step)update to save this specific record using id
Route::PUT('/posts/{post}',[PostController::class, 'update'])->name(name:'posts.update');

//7.destroy to delete specific record using id
Route::delete('/posts/{post}',[PostController::class , 'destroy'])->name(name: 'posts.destroy');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
