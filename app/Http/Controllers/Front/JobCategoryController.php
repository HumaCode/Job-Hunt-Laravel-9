<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\JobCategory;
use App\Models\PageJobCategoryItem;
use Illuminate\Http\Request;

class JobCategoryController extends Controller
{
    public function category()
    {
        $job_categories = JobCategory::get();
        $job_category_item = PageJobCategoryItem::find(1);

        return view('front.job_categories', compact('job_categories', 'job_category_item'));
    }
}
