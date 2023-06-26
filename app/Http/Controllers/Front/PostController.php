<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(6);

        return view('front.blog', compact('posts'));
    }

    public function detail($slug)
    {
        $post = Post::where('slug', $slug)->first();

        return view('front.post', compact('post'));
    }
}
