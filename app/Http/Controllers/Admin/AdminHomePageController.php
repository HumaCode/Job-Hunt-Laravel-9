<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminHomePageController extends Controller
{
    public function index()
    {

        return view('admin.page_home');
    }
}
