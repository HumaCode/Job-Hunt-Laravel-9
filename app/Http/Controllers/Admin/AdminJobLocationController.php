<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobLocation;
use Illuminate\Http\Request;

class AdminJobLocationController extends Controller
{
    public function index()
    {
        $job_locations = JobLocation::orderBy('id', 'desc')->get();

        return view('admin.job_location', compact('job_locations'));
    }

    public function create()
    {
        return view('admin.job_location_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|unique:job_categories,name',
        ]);

        $jobLocation = new JobLocation();
        $jobLocation->name = $request->name;
        $jobLocation->save();

        return redirect()->route('admin_job_location')->with('success', 'Data is saved successfully.');
    }

    public function edit($id)
    {
        $jobLocation = JobLocation::findOrFail($id);

        return view('admin.job_location_edit', compact('jobLocation'));
    }

    public function update(Request $request, $id)
    {
        $job_location = JobLocation::where('id', $id)->first();

        $request->validate([
            'name'      => 'required',
        ]);

        $job_location->name = $request->name;
        $job_location->save();

        return redirect()->route('admin_job_location')->with('success', 'Data is updated successfully.');
    }

    public function delete($id)
    {
        JobLocation::where('id', $id)->delete();

        return redirect()->route('admin_job_location')->with('success', 'Data is deleted successfully.');
    }
}
