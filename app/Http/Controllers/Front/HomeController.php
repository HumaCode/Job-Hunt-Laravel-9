<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\JobCategory;
use App\Models\PageHomeItem;
use App\Models\WhyChooseItem;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $home_page_data     = PageHomeItem::where('id', 1)->first();

        if ($home_page_data->background != null) {
            $gmbr = 'storage/' . substr($home_page_data->background, -52);
        } else {
            $gmbr = 'dist/uploads/heading5.jpg';
        }

        $data = [
            'gmbr'              => $gmbr,
            'home_page_data'    => $home_page_data,
            'job_categories'    => JobCategory::take(9)->get(),
            'why_choose_item'   => WhyChooseItem::get(),
        ];

        return view('front.home', $data);
    }
}
