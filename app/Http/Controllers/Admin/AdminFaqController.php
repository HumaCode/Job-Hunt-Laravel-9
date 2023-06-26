<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class AdminFaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('id', 'desc')->get();

        return view('admin.faq', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faq_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question'    => 'required',
            'answer'      => 'required',
        ]);

        $category = new Faq();
        $category->question = $request->question;
        $category->answer = $request->answer;
        $category->save();

        return redirect()->route('admin_faq')->with('success', 'Data is saved successfully.');
    }

    public function edit($id)
    {
        $faq = Faq::findOrFail($id);

        return view('admin.faq_edit', compact('faq'));
    }

    public function update(Request $request, $id)
    {
        $faq = Faq::where('id', $id)->first();

        $request->validate([
            'question'    => 'required',
            'answer'      => 'required',
        ]);

        $faq->question  = $request->question;
        $faq->answer    = $request->answer;
        $faq->save();

        return redirect()->route('admin_faq')->with('success', 'Data is updated successfully.');
    }

    public function delete($id)
    {
        Faq::where('id', $id)->delete();

        return redirect()->route('admin_job_category')->with('success', 'Data is deleted successfully.');
    }
}
