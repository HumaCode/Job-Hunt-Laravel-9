<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageTermItem;
use Illuminate\Http\Request;

class AdminTermPageController extends Controller
{
    public function index()
    {
        $page_term = PageTermItem::where('id', 1)->first();

        return view('admin.page_term', compact('page_term'));
    }

    public function update(Request $request)
    {
        $page_term = PageTermItem::where('id', 1)->first();

        $request->validate([
            'heading'           => 'required',
            'content'           => 'required',
            'title'             => 'required',
            'meta_description'  => 'required',
        ]);

        $page_term->heading          = $request->heading;
        $page_term->content          = $request->content;
        $page_term->title            = $request->title;
        $page_term->meta_description = $request->meta_description;
        $page_term->save();

        return redirect()->back()->with('success', 'Data is updated successfully.');
    }
}
