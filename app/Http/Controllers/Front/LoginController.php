<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\PageOtherItem;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        $page_other    = PageOtherItem::where('id', 1)->first();

        return view('front.login', compact('page_other'));
    }
}
