<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobExperience;
use Illuminate\Http\Request;

class AdminJobExperienceController extends Controller
{
    public function index()
    {
        $job_experiences = JobExperience::orderBy('id', 'desc')->get();

        return view('admin.job_experience', compact('job_experiences'));
    }

    public function create()
    {
        return view('admin.job_experience_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|unique:job_types,name',
        ]);

        $jobexperience = new JobExperience();
        $jobexperience->name = $request->name;
        $jobexperience->save();

        return redirect()->route('admin_job_experience')->with('success', 'Data is saved successfully.');
    }

    public function edit($id)
    {
        $jobExperience = JobExperience::findOrFail($id);

        return view('admin.job_experience_edit', compact('jobExperience'));
    }

    public function update(Request $request, $id)
    {
        $job_experience = JobExperience::where('id', $id)->first();

        $request->validate([
            'name'      => 'required',
        ]);

        $job_experience->name = $request->name;
        $job_experience->save();

        return redirect()->route('admin_job_experience')->with('success', 'Data is updated successfully.');
    }

    public function delete($id)
    {
        JobExperience::where('id', $id)->delete();

        return redirect()->route('admin_job_experience')->with('success', 'Data is deleted successfully.');
    }
}
