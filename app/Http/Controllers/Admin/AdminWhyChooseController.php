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
            'heading'   => 'required|unique:why_choose_items,heading',
            'text'      => 'required',
        ]);

        $why_choose = new WhyChooseItem();
        $why_choose->icon       = $request->icon;
        $why_choose->heading    = $request->heading;
        $why_choose->text       = $request->text;
        $why_choose->save();

        return redirect()->back()->with('success', 'Data is saved successfully.');
    }

    public function edit($id)
    {
        $why_choose = WhyChooseItem::findOrFail($id);

        return view('admin.why_choose_item_edit', compact('why_choose'));
    }

    public function update(Request $request, $id)
    {
        $why_choose = WhyChooseItem::where('id', $id)->first();

        $request->validate([
            'icon'      => 'required',
            'heading'   => 'required|unique:why_choose_items,heading,' . $id,
            'text'      => 'required',
        ]);

        $why_choose->icon       = $request->icon;
        $why_choose->heading    = $request->heading;
        $why_choose->text       = $request->text;
        $why_choose->save();

        return redirect()->back()->with('success', 'Data is updated successfully.');
    }

    public function delete($id)
    {
        WhyChooseItem::where('id', $id)->delete();

        return redirect()->route('admin_why_choose_item')->with('success', 'Data is deleted successfully.');
    }
}
