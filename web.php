<?php
use App\Http\Controllers\mycontroller;
use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome'); 
})->name('welcome');

Route::get('/login', function () {
    
    $posts = collect(); 

    if (Auth::check()) { 
        $user = Auth::user();
        
        $posts = Post::where('user_id', $user->id)->latest()->get(); 
    } 

    return view('login', ['posts' => $posts]); 
})->name('login');



Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');



Route::get('/forum', function () {
    return view('forum');
});

Route::post('/logout',[mycontroller::class,'logout']);
Route::post('/login',[mycontroller::class,'login']);
Route::post('/register',[mycontroller::class,'register']);


//post related routes
Route::post('/create-posts', [PostController::class, 'createPost']);
Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']);
Route::put('/edit-post/{post}', [PostController::class, 'updatePost']);
Route::delete('/delete-post/{post}', [PostController::class, 'destroyPost']);