<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\PageOtherItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        $page_other    = PageOtherItem::where('id', 1)->first();

        return view('front.login', compact('page_other'));
    }

    public function company_login_submit(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);


        $credential = [
            'username'     => $request->username,
            'password'     => $request->password,
        ];

        if (Auth::guard('company')->attempt($credential)) {
            return redirect()->route('company_dashboard')->with('success', 'Login has successfully');
        } else {
            return redirect()->route('login')->with('error', 'Informasi is not correct!');
        }
    }
}
