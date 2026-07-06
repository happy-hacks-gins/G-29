<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{   
    public function destroyPost(Post $post)
    {
        if (Auth::id() !== $post->user_id) {
            return redirect('/');
        }

        $post->delete();

        return redirect('/login');
    }
   public function updatePost(Request $request, Post $post)
    {
        if (Auth::id() !== $post->user_id) {
            return redirect('/');
        }

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $validatedData['title'] = strip_tags($validatedData['title']);
        $validatedData['body'] = strip_tags($validatedData['body']);

        $post->update($validatedData);

        return redirect('/login');         
    }
   public function showEditScreen(Post $post)
    {
        if (Auth::id() !== $post->user_id) {
            return redirect('/');


        }
        return view('edit-post',['post'=> $post]);
    }

    public function createPost(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $validatedData['title'] = strip_tags($validatedData['title']);
        $validatedData['body'] = strip_tags($validatedData['body']);
        $validatedData['user_id'] = Auth::id(); // Assuming you have user authentication
        Post::create($validatedData);
        return redirect('/login');
    }
}
