<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageOtherItem;
use Illuminate\Http\Request;

class AdminOtherPageController extends Controller
{
    public function index()
    {
        $page_other = PageOtherItem::where('id', 1)->first();

        return view('admin.page_other', compact('page_other'));
    }

    public function update(Request $request)
    {
        $page_other = PageOtherItem::where('id', 1)->first();

        $request->validate([
            'login_page_heading'            => 'required',
            'signup_page_heading'           => 'required',
            'forget_password_page_heading'  => 'required',
        ]);

        $page_other->login_page_heading                     = $request->login_page_heading;
        $page_other->login_page_title                       = $request->login_page_title;
        $page_other->login_page_meta_description            = $request->login_page_meta_description;
        $page_other->signup_page_heading                    = $request->signup_page_heading;
        $page_other->signup_page_title                      = $request->signup_page_title;
        $page_other->signup_page_meta_description           = $request->signup_page_meta_description;
        $page_other->forget_password_page_heading           = $request->forget_password_page_heading;
        $page_other->forget_password_page_title             = $request->forget_password_page_title;
        $page_other->forget_password_page_meta_description  = $request->forget_password_page_meta_description;
        $page_other->save();

        return redirect()->back()->with('success', 'Data is updated successfully.');
    }
}
