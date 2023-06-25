<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

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
            'icon'      => 'required',
            'heading'   => 'required|unique:why_choose_items,heading',
            'text'      => 'required',
        ]);

        $why_choose = new WhyChooseItem();
        $why_choose->icon       = $request->icon;
        $why_choose->heading    = $request->heading;
        $why_choose->text       = $request->text;
        $why_choose->save();

        return redirect()->back()->with('success', 'Data is saved successfully.');
    }
}
