<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index()
    {
        $packages = Package::get();

        return view('front.pricing', compact('packages'));
    }
}
