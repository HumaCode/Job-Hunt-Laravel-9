<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageJobCategoryItem;
use Illuminate\Http\Request;

class AdminJobCategoryPageController extends Controller
{
    public function index()
    {
        $job_category = PageJobCategoryItem::where('id', 1)->first();

        return view('admin.page_job_category', compact('job_category'));
    }

    public function update(Request $request)
    {
        $job_category = PageJobCategoryItem::where('id', 1)->first();

        $request->validate([
            'heading'           => 'required',
            'title'             => 'required',
            'meta_description'  => 'required',
        ]);

        $job_category->heading          = $request->heading;
        $job_category->title            = $request->title;
        $job_category->meta_description = $request->meta_description;
        $job_category->save();

        return redirect()->back()->with('success', 'Data is updated successfully.');
    }
}
