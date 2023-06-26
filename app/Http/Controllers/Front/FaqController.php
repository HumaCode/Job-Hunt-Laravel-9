<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\PageFaqItem;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::get();
        $faq    = PageFaqItem::where('id', 1)->first();

        return view('front.faq', compact('faqs', 'faq'));
    }
}
