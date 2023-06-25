<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::where('id', 1)->get();

        return view('admin.post', compact('posts'));
    }

    public function create()
    {
        return view('admin.post_create');
    }

    public function checkSlug(Request $request)
    {

        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }
}
