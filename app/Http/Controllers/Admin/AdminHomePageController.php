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
            'heading'      => 'required',
            'text'         => 'required',
            'job_title'    => 'required',
            'job_category' => 'required',
            'job_location' => 'required',
            'search'       => 'required',
        ]);

        if ($request->hasFile('background')) {

            $request->validate([
                'background' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
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

        $home_page_data->heading        = $request->heading;
        $home_page_data->text           = $request->text;
        $home_page_data->job_title      = $request->job_title;
        $home_page_data->job_category   = $request->job_category;
        $home_page_data->job_location   = $request->job_location;
        $home_page_data->search         = $request->search;
        $home_page_data->update();

        return redirect()->back()->with('success', 'Data is updated successfully.');
    }
}
