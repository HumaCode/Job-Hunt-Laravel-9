<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\PageHomeItem;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $home_page_data = PageHomeItem::where('id', 1)->first();

        if ($home_page_data->background != null) {
            $gmbr = 'storage/' . substr($home_page_data->background, -52);
        } else {
            $gmbr = 'dist/uploads/heading5.jpg';
        }

        return view('front.home', compact('home_page_data', 'gmbr'));
    }
}
