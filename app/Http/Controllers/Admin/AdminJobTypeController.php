<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobType;
use Illuminate\Http\Request;

class AdminJobTypeController extends Controller
{
    public function index()
    {
        $job_types = JobType::orderBy('id', 'desc')->get();

        return view('admin.job_type', compact('job_types'));
    }

    public function create()
    {
        return view('admin.job_type_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|unique:job_types,name',
        ]);

        $jobType = new JobType();
        $jobType->name = $request->name;
        $jobType->save();

        return redirect()->route('admin_job_type')->with('success', 'Data is saved successfully.');
    }

    public function edit($id)
    {
        $jobType = JobType::findOrFail($id);

        return view('admin.job_type_edit', compact('jobType'));
    }

    public function update(Request $request, $id)
    {
        $job_type = JobType::where('id', $id)->first();

        $request->validate([
            'name'      => 'required',
        ]);

        $job_type->name = $request->name;
        $job_type->save();

        return redirect()->route('admin_job_type')->with('success', 'Data is updated successfully.');
    }

    public function delete($id)
    {
        JobType::where('id', $id)->delete();

        return redirect()->route('admin_job_type')->with('success', 'Data is deleted successfully.');
    }
}
