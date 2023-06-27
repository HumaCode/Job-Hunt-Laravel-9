<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageContactItem;
use Illuminate\Http\Request;

class AdminContactPageController extends Controller
{
    public function index()
    {
        $page_contact = PageContactItem::where('id', 1)->first();

        return view('admin.page_contact', compact('page_contact'));
    }

    public function update(Request $request)
    {
        $contact_item = PageContactItem::where('id', 1)->first();

        $request->validate([
            'heading'           => 'required',
            'map_code'          => 'required',
            'title'             => 'required',
            'meta_description'  => 'required',
        ]);

        $contact_item->heading          = $request->heading;
        $contact_item->map_code         = $request->map_code;
        $contact_item->title            = $request->title;
        $contact_item->meta_description = $request->meta_description;
        $contact_item->save();

        return redirect()->back()->with('success', 'Data is updated successfully.');
    }
}
