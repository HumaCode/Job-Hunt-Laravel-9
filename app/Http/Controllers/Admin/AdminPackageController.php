<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class AdminPackageController extends Controller
{
    public function index()
    {
        $packages = Package::orderBy('id', 'desc')->get();

        return view('admin.package', compact('packages'));
    }

    public function create()
    {
        return view('admin.package_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'package_name' => 'required',
            'package_price' => 'required',
            'package_days' => 'required',
            'package_display_time' => 'required',
            'total_allowed_jobs' => 'required',
            'total_allowed_featured_jobs' => 'required',
            'total_allowed_photos' => 'required',
            'total_allowed_videos' => 'required',
        ]);

        $package = new Package();
        $package->package_name = $request->package_name;
        $package->package_price = $request->package_price;
        $package->package_days = $request->package_days;
        $package->package_display_time = $request->package_display_time;
        $package->total_allowed_jobs = $request->total_allowed_jobs;
        $package->total_allowed_featured_jobs = $request->total_allowed_featured_jobs;
        $package->total_allowed_photos = $request->total_allowed_photos;
        $package->total_allowed_videos = $request->total_allowed_videos;
        $package->save();

        return redirect()->route('admin_package')->with('success', 'Data is saved successfully.');
    }

    public function edit($id)
    {
        $faq = Faq::findOrFail($id);

        return view('admin.faq_edit', compact('faq'));
    }

    public function update(Request $request, $id)
    {
        $faq = Faq::where('id', $id)->first();

        $request->validate([
            'question'    => 'required',
            'answer'      => 'required',
        ]);

        $faq->question  = $request->question;
        $faq->answer    = $request->answer;
        $faq->save();

        return redirect()->route('admin_faq')->with('success', 'Data is updated successfully.');
    }

    public function delete($id)
    {
        Faq::where('id', $id)->delete();

        return redirect()->route('admin_job_category')->with('success', 'Data is deleted successfully.');
    }
}
