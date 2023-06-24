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
}
