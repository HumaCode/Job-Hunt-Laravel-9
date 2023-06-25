<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\JobCategory;
use App\Models\PageHomeItem;
use App\Models\Testimonial;
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
            $gmbr = 'dist-front/uploads/heading5.jpg';
        }

        if ($home_page_data->why_choose_background != null) {
            $gmbr2 = 'storage/' . substr($home_page_data->why_choose_background, -52);
        } else {
            $gmbr2 = 'dist-front/uploads/banner3.jpg';
        }

        if ($home_page_data->testimonial_background != null) {
            $gmbr3 = 'storage/' . substr($home_page_data->testimonial_background, -52);
        } else {
            $gmbr3 = 'dist-front/uploads/banner11.jpg';
        }

        $data = [
            'gmbr'                  => $gmbr,
            'gmbr2'                 => $gmbr2,
            'gmbr3'                 => $gmbr3,
            'home_page_data'        => $home_page_data,
            'job_categories'        => JobCategory::take(9)->get(),
            'job_categories_select' => JobCategory::get(),
            'why_choose_item'       => WhyChooseItem::get(),
            'testimonials'          => Testimonial::get(),
        ];

        return view('front.home', $data);
    }
}
