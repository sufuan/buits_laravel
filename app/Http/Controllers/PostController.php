<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Auth::user()->posts;
        return view('home', compact('posts'));
    }

    public function create()
    {
        return view('create_post');
    }

    public function storeDefault()
    {
        Post::create([
            'title' => 'post title',
            'description' => 'post des',
            'post_status' => 'pending',
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('home')->with('success', 'Default post created successfully.');
    }

    public function storeForm(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'post_status' => 'pending',
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('home')->with('success', 'Post created successfully.');
    }
}
