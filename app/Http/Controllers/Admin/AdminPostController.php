<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();

        return view('admin.post', compact('posts'));
    }

    public function create()
    {
        return view('admin.post_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading'           => 'required',
            'slug'              => 'required',
            'photo'             => 'required|image|mimes:png,jpg|max:5000',
            'short_description' => 'required',
            'description'       => 'required',
            'title'             => 'required',
            'meta_description'  => 'required',
        ]);

        $post                = new Post();

        $image      = $request->file('photo');
        // $name_gen   = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(1300, 866);

        $post->photo = $request->file('photo')->store('public/uploads');

        $post->heading              = $request->heading;
        $post->slug                 = $request->slug;
        $post->short_description    = $request->short_description;
        $post->description          = $request->description;
        $post->total_view           = 0;
        $post->title                = $request->title;
        $post->meta_description     = $request->meta_description;
        $post->save();

        return redirect()->route('admin_post')->with('success', 'Data is saved successfully.');
    }

    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->first();

        return view('admin.post_edit', compact('post'));
    }

    public function update(Request $request, $slug)
    {
        $post = Post::where('slug', $slug)->first();
        $id = $post->id;

        $request->validate([
            'heading'           => 'required|unique:posts,heading,' . $id,
            'slug'              => 'required',
            'photo'             => 'nullable|image|mimes:png,jpg|max:5000',
            'short_description' => 'required',
            'description'       => 'required',
            'title'             => 'required',
            'meta_description'  => 'required',
        ]);

        if ($request->hasFile('photo')) {

            if ($post->photo != null) {
                Storage::delete($post->photo);
            }

            $image      = $request->file('photo');
            // $name_gen   = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300);

            $post->photo = $request->file('photo')->store('public/uploads');
        }

        $post->heading              = $request->heading;
        $post->slug                 = $request->slug;
        $post->short_description    = $request->short_description;
        $post->description          = $request->description;
        $post->title                = $request->title;
        $post->meta_description     = $request->meta_description;
        $post->save();

        return redirect()->route('admin_post')->with('success', 'Data is updated successfully.');
    }

    public function delete($slug)
    {
        $post = Post::where('slug', $slug)->first();

        if ($post->photo != null) {
            // unlink
            Storage::delete($post->photo);
        }

        Post::where('slug', $slug)->delete();


        return redirect()->route('admin_post')->with('success', 'Data is deleted successfully.');
    }


    public function checkSlug(Request $request)
    {

        $slug = SlugService::createSlug(Post::class, 'slug', $request->heading);

        return response()->json(['slug' => $slug]);
    }
}
