<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyChooseItem;
use Illuminate\Http\Request;

class AdminWhyChooseController extends Controller
{
    public function index()
    {
        $why_choose_items = WhyChooseItem::orderBy('id', 'desc')->get();

        return view('admin.why_choose_item', compact('why_choose_items'));
    }

    public function create()
    {
        return view('admin.why_choose_item_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon'      => 'required',
            'heading'   => 'required',
            'text'   => 'required',
        ]);

        $why_choose = new WhyChooseItem();
        $why_choose->icon       = $request->icon;
        $why_choose->heading    = $request->heading;
        $why_choose->text       = $request->text;
        $why_choose->save();

        return redirect()->back()->with('success', 'Data is saved successfully.');
    }
}
