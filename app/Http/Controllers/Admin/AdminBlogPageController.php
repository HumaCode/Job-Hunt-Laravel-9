<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageBlogItem;
use Illuminate\Http\Request;

class AdminBlogPageController extends Controller
{
    public function index()
    {
        $page_blog_data = PageBlogItem::where('id', 1)->first();

        return view('admin.page_blog', compact('page_blog_data'));
    }

    public function update(Request $request)
    {
        $faq_item = PageBlogItem::where('id', 1)->first();

        $request->validate([
            'heading'           => 'required',
            'title'             => 'required',
            'meta_description'  => 'required',
        ]);

        $faq_item->heading          = $request->heading;
        $faq_item->title            = $request->title;
        $faq_item->meta_description = $request->meta_description;
        $faq_item->save();

        return redirect()->back()->with('success', 'Data is updated successfully.');
    }
}
