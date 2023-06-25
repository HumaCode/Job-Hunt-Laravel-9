<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class AdminTestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('id', 'desc')->get();

        return view('admin.testimonial', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonial_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'photo'         => 'required|image|mimes:png,jpg|max:5000',
            'designation'   => 'required',
            'comment'       => 'required',
        ]);

        $testimonial                = new Testimonial();

        $image      = $request->file('photo');
        // $name_gen   = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300);

        $testimonial->photo = $request->file('photo')->store('public/uploads');

        $testimonial->name          = $request->name;
        $testimonial->designation   = $request->designation;
        $testimonial->comment       = $request->comment;
        $testimonial->save();

        return redirect()->back()->with('success', 'Data is saved successfully.');
    }

    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        return view('admin.testimonial_edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::where('id', $id)->first();

        $request->validate([
            'name'          => 'required',
            'photo'         => 'nullable|image|mimes:png,jpg|max:5000',
            'designation'   => 'required',
            'comment'       => 'required',
        ]);

        if ($request->hasFile('photo')) {

            if ($testimonial->photo != null) {
                if ($testimonial->photo != 'public/uploads/t2.jpg') {
                    // unlink
                    Storage::delete($testimonial->photo);
                }
            }

            $image      = $request->file('photo');
            // $name_gen   = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300);

            $testimonial->photo = $request->file('photo')->store('public/uploads');
        }

        $testimonial->name          = $request->name;
        $testimonial->designation   = $request->designation;
        $testimonial->comment       = $request->comment;
        $testimonial->save();

        return redirect()->back()->with('success', 'Data is updated successfully.');
    }

    public function delete($id)
    {
        $testimonial = Testimonial::where('id', $id)->first();

        if ($testimonial->photo != 'public/uploads/t2.jpg') {
            // unlink
            Storage::delete($testimonial->photo);
        }

        Testimonial::where('id', $id)->delete();


        return redirect()->route('admin_testimonial')->with('success', 'Data is deleted successfully.');
    }
}
