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
        $package = Package::findOrFail($id);

        return view('admin.package_edit', compact('package'));
    }

    public function update(Request $request, $id)
    {
        $package = Package::where('id', $id)->first();

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

        $package->package_name = $request->package_name;
        $package->package_price = $request->package_price;
        $package->package_days = $request->package_days;
        $package->package_display_time = $request->package_display_time;
        $package->total_allowed_jobs = $request->total_allowed_jobs;
        $package->total_allowed_featured_jobs = $request->total_allowed_featured_jobs;
        $package->total_allowed_photos = $request->total_allowed_photos;
        $package->total_allowed_videos = $request->total_allowed_videos;
        $package->save();

        return redirect()->route('admin_package')->with('success', 'Data is updated successfully.');
    }

    public function delete($id)
    {
        Package::where('id', $id)->delete();

        return redirect()->route('admin_package')->with('success', 'Data is deleted successfully.');
    }
}
