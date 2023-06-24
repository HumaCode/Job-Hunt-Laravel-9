<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\JobCategory;
use Illuminate\Http\Request;

class JobCategoryController extends Controller
{
    public function category()
    {
        $job_categories = JobCategory::get();

        return view('front.job_categories', compact('job_categories'));
    }
}
