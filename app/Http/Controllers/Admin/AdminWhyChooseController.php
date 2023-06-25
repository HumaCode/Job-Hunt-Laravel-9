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
}
