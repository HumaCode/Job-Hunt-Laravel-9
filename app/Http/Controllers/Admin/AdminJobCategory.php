<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobCategory;
use Illuminate\Http\Request;

class AdminJobCategory extends Controller
{
    public function index()
    {
        $job_categories = JobCategory::orderBy('id', 'desc')->get();

        return view('admin.job_category', compact('job_categories'));
    }

    public function create()
    {
        return view('admin.job_category_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|unique:job_categories,name',
            'icon'      => 'required',
        ]);

        $category = new JobCategory();
        $category->name = $request->name;
        $category->icon = $request->icon;
        $category->save();

        return redirect()->back()->with('success', 'Data is saved successfully.');
    }

    public function edit($id)
    {
        $jobCategory = JobCategory::findOrFail($id);

        return view('admin.job_category_edit', compact('jobCategory'));
    }

    public function update(Request $request, $id)
    {
        $job_category = JobCategory::where('id', $id)->first();

        $request->validate([
            'name'      => 'required|unique:job_categories,name,' . $id,
            'icon'      => 'required',
        ]);

        $job_category->name = $request->name;
        $job_category->icon = $request->icon;
        $job_category->save();

        return redirect()->back()->with('success', 'Data is updated successfully.');
    }

    public function delete($id)
    {
        JobCategory::where('id', $id)->delete();

        return redirect()->route('admin_job_category')->with('success', 'Data is deleted successfully.');
    }
}
