<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\PageOtherItem;
use Illuminate\Http\Request;
use App\Mail\Websitemail;

class ForgetPasswordController extends Controller
{
    public function company_forget_password()
    {
        $page_other    = PageOtherItem::where('id', 1)->first();

        return view('front.forget_password_company', compact('page_other'));
    }

    public function company_forget_password_submit(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
        ]);

        $company_data = Company::where('email', $request->email)->first();
        if (!$company_data) {
            return redirect()->back()->with('error', 'Email address not found');
        }

        $token          = hash('sha256', time());
        $company_data->token = $token;
        $company_data->update();

        $reset_link     = url('reset-password/company/' . $token . '/' . $request->email);
        $subject        = 'Reset Password';
        $message        = 'Please click on the following link <br>';
        $message        .= '<a href="' . $reset_link . '">Click Hire<br>';


        \Mail::to($request->email)->send(new Websitemail($subject, $message));

        return redirect()->route('login')->with('success', 'Please check your email and follow the step there.');
    }
}
