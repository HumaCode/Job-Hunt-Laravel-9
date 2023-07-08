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
        if (Auth::guard('candidate')->check()) {
            return redirect()->route('candidate_dashboard')->with('error', 'You are logged in!');
        }

        if (Auth::guard('company')->check()) {
            return redirect()->route('company_dashboard')->with('error', 'You are logged in!');
        }

        $page_other    = PageOtherItem::where('id', 1)->first();

        return view('front.login', compact('page_other'));
    }

    public function company_logout()
    {
        Auth::guard('company')->logout();

        return redirect()->route('login')->with('success', 'Logout has successfully');
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
            return redirect()->route('login')->with('error', 'Information is not correct!');
        }
    }

    public function candidate_login_submit(Request $request)
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

        if (Auth::guard('candidate')->attempt($credential)) {
            return redirect()->route('candidate_dashboard')->with('success', 'Login has successfully');
        } else {
            return redirect()->route('login')->with('error', 'Information is not correct!');
        }
    }

    public function candidate_logout()
    {
        Auth::guard('candidate')->logout();

        return redirect()->route('login')->with('success', 'Logout has successfully');
    }
}
