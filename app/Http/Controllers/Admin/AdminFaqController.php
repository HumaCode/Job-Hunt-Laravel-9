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
}
