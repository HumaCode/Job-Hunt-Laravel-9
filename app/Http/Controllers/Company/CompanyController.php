<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function dashboard()
    {
        return view('company.dashboard');
    }

    public function company_logout()
    {
        Auth::guard('company')->logout();

        return redirect()->route('login')->with('success', 'Logout has successfully');
    }
}
