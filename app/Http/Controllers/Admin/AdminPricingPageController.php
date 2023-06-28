<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PagePricingItem;
use Illuminate\Http\Request;

class AdminPricingPageController extends Controller
{
    public function index()
    {
        $page_pricing = PagePricingItem::where('id', 1)->first();

        return view('admin.page_pricing', compact('page_pricing'));
    }

    public function update(Request $request)
    {
        $page_pricing = PagePricingItem::where('id', 1)->first();

        $request->validate([
            'heading'           => 'required',
            'title'             => 'required',
            'meta_description'  => 'required',
        ]);

        $page_pricing->heading          = $request->heading;
        $page_pricing->title            = $request->title;
        $page_pricing->meta_description = $request->meta_description;
        $page_pricing->save();

        return redirect()->back()->with('success', 'Data is updated successfully.');
    }
}
