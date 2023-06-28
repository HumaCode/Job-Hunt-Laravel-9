<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageHomeItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AdminHomePageController extends Controller
{
    public function index()
    {
        $page_home_data = PageHomeItem::where('id', 1)->first();

        return view('admin.page_home', compact('page_home_data'));
    }

    public function update(Request $request)
    {
        $home_page_data = PageHomeItem::where('id', 1)->first();

        $request->validate([
            'heading'                   => 'required',
            'text'                      => 'required',
            'job_title'                 => 'required',
            'job_category'              => 'required',
            'job_location'              => 'required',
            'search'                    => 'required',
            'job_category_heading'      => 'required',
            'job_category_subheading'   => 'nullable',
            'job_category_status'       => 'required',
            'why_choose_heading'        => 'required',
            'why_choose_subheading'     => 'nullable',
            'why_choose_status'         => 'required',
            'feature_jobs_heading'      => 'required',
            'feature_jobs_subheading'   => 'nullable',
            'feature_jobs_status'       => 'required',
            'testimonial_heading'       => 'required',
            'testimonial_status'        => 'required',
            'blog_heading'              => 'required',
            'blog_subheading'           => 'nullable',
            'blog_status'               => 'required',
            'title'                     => 'required',
            'meta_description'          => 'required',
        ]);

        // search
        if ($request->hasFile('background')) {

            $request->validate([
                'background' => 'nullable|image|mimes:png,jpg|max:5000',
            ]);

            if ($home_page_data->background != null) {
                // unlink
                Storage::delete($home_page_data->background);
            }

            $image      = $request->file('background');
            // $name_gen   = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1300, 866);

            $home_page_data->background = $request->file('background')->store('public/uploads');
        }

        // why choose
        if ($request->hasFile('why_choose_background')) {

            $request->validate([
                'why_choose_background' => 'nullable|image|mimes:png,jpg|max:5000',
            ]);

            if ($home_page_data->why_choose_background != null) {
                // unlink
                Storage::delete($home_page_data->why_choose_background);
            }

            $image2      = $request->file('why_choose_background');
            // $name_gen   = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image2)->resize(1300, 866);

            $home_page_data->why_choose_background = $request->file('why_choose_background')->store('public/uploads');
        }
        // testimonial
        if ($request->hasFile('testimonial_background')) {

            $request->validate([
                'testimonial_background' => 'nullable|image|mimes:png,jpg|max:5000',
            ]);

            if ($home_page_data->testimonial_background != null) {
                // unlink
                Storage::delete($home_page_data->testimonial_background);
            }

            $image3      = $request->file('testimonial_background');
            // $name_gen   = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image3)->resize(1300, 866);

            $home_page_data->testimonial_background = $request->file('testimonial_background')->store('public/uploads');
        }

        $home_page_data->heading                    = $request->heading;
        $home_page_data->text                       = $request->text;
        $home_page_data->job_title                  = $request->job_title;
        $home_page_data->job_category               = $request->job_category;
        $home_page_data->job_location               = $request->job_location;
        $home_page_data->search                     = $request->search;
        $home_page_data->job_category_heading       = $request->job_category_heading;
        $home_page_data->job_category_subheading    = $request->job_category_subheading;
        $home_page_data->job_category_status        = $request->job_category_status;
        $home_page_data->why_choose_heading         = $request->why_choose_heading;
        $home_page_data->why_choose_subheading      = $request->why_choose_subheading;
        $home_page_data->why_choose_status          = $request->why_choose_status;
        $home_page_data->feature_jobs_heading       = $request->feature_jobs_heading;
        $home_page_data->feature_jobs_subheading    = $request->feature_jobs_subheading;
        $home_page_data->feature_jobs_status        = $request->feature_jobs_status;
        $home_page_data->testimonial_heading        = $request->testimonial_heading;
        $home_page_data->testimonial_status         = $request->testimonial_status;
        $home_page_data->blog_heading               = $request->blog_heading;
        $home_page_data->blog_subheading            = $request->blog_subheading;
        $home_page_data->blog_status                = $request->blog_status;
        $home_page_data->title                      = $request->title;
        $home_page_data->meta_description           = $request->meta_description;
        $home_page_data->update();

        return redirect()->back()->with('success', 'Data is updated successfully.');
    }
}
