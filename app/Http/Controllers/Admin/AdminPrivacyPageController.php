<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PagePrivacyItem;
use Illuminate\Http\Request;

class AdminPrivacyPageController extends Controller
{
    public function index()
    {
        $page_privacy = PagePrivacyItem::where('id', 1)->first();

        return view('admin.page_privacy', compact('page_privacy'));
    }

    public function update(Request $request)
    {
        $page_privacy = PagePrivacyItem::where('id', 1)->first();

        $request->validate([
            'heading'           => 'required',
            'content'           => 'required',
            'title'             => 'required',
            'meta_description'  => 'required',
        ]);

        $page_privacy->heading          = $request->heading;
        $page_privacy->content          = $request->content;
        $page_privacy->title            = $request->title;
        $page_privacy->meta_description = $request->meta_description;
        $page_privacy->save();

        return redirect()->back()->with('success', 'Data is updated successfully.');
    }
}
