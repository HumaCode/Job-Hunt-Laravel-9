<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\PageHomeItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminHomePageController extends Controller
{
    public function index()
    {
        $page_home_data = PageHomeItem::where('id', 1)->first();

        return view('admin.page_home', compact('page_home_data'));
    }

    public function update(Request $request)
    {
        dd($request->all());
    }
}
