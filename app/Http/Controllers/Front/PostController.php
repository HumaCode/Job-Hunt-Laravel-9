<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\PageBlogItem;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(6);
        $page_blog    = PageBlogItem::where('id', 1)->first();


        return view('front.blog', compact('posts', 'page_blog'));
    }

    public function detail($slug)
    {
        $post = Post::where('slug', $slug)->first();
        DB::table('posts')->where('slug', $slug)->increment('total_view');

        return view('front.post', compact('post'));
    }
}
