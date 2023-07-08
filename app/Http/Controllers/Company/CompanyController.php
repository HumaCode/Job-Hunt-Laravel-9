<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function dashboard()
    {
        return view('company.dashboard');
    }

    public function make_payment()
    {
        $current_plan   = Order::where('company_id', Auth::guard('company')->user()->id)->where('currently_active', 1)->first();
        $packages       = Package::get();

        return view('company.make_payment', compact('current_plan', 'packages'));
    }
}
