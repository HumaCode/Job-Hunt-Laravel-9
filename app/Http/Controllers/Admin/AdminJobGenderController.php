<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobGender;
use Illuminate\Http\Request;

class AdminJobGenderController extends Controller
{
    public function index()
    {
        $job_genders = JobGender::orderBy('id', 'desc')->get();

        return view('admin.job_gender', compact('job_genders'));
    }

    public function create()
    {
        return view('admin.job_gender_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|unique:job_genders,name',
        ]);

        $jobGender = new JobGender();
        $jobGender->name = $request->name;
        $jobGender->save();

        return redirect()->route('admin_job_gender')->with('success', 'Data is saved successfully.');
    }

    public function edit($id)
    {
        $jobGender = JobGender::findOrFail($id);

        return view('admin.job_gender_edit', compact('jobGender'));
    }

    public function update(Request $request, $id)
    {
        $job_gender = JobGender::where('id', $id)->first();

        $request->validate([
            'name'      => 'required',
        ]);

        $job_gender->name = $request->name;
        $job_gender->save();

        return redirect()->route('admin_job_gender')->with('success', 'Data is updated successfully.');
    }

    public function delete($id)
    {
        JobGender::where('id', $id)->delete();

        return back()->with('success', 'Data is deleted successfully.');
    }
}
