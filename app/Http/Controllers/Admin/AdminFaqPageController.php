<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageFaqItem;
use Illuminate\Http\Request;

class AdminFaqPageController extends Controller
{
    public function index()
    {
        $page_faq_data = PageFaqItem::where('id', 1)->first();

        return view('admin.page_faq', compact('page_faq_data'));
    }

    public function update(Request $request, $id)
    {
        $faq_item = PageFaqItem::where('id', $id)->first();

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
