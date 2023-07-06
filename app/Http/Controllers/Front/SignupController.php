<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\PageOtherItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\Websitemail;

class SignupController extends Controller
{
    public function index()
    {
        $page_other    = PageOtherItem::where('id', 1)->first();

        return view('front.signup', compact('page_other'));
    }

    public function company_signup_submit(Request $request)
    {
        $request->validate([
            'company_name'      => 'required',
            'person_name'       => 'required',
            'username'          => 'required|unique:companies',
            'email'             => 'required|email|unique:companies',
            'password'          => 'required',
            'retype_password'   => 'required|same:password',
        ]);

        $token          = hash('sha256', time());

        $company = new Company();
        $company->company_name     = $request->company_name;
        $company->person_name      = $request->person_name;
        $company->username         = $request->username;
        $company->email            = $request->email;
        $company->password         = Hash::make($request->password);
        $company->token            = $token;
        $company->save();

        $verify_link    = url('company-signup-verify/' . $token . '/' .  $request->email);
        $subject        = 'Company signup verification';
        $message        = 'Please click on the following link <br>';
        $message        .= '<a href="' . $verify_link . '">Click Hire<br>';


        \Mail::to($request->email)->send(new Websitemail($subject, $message));

        return redirect()->route('login')->with('success', 'An email is sent to your email address. You must have to check that and click on the confirmation link to validate');
    }

    public function company_signup_verify($token, $email)
    {

        $company_data = Company::where('token', $token)->where('email', $email)->first();

        // echo $company_data->company_name;

        if (!$company_data) {
            return redirect()->route('login')->with('error', 'Your email is verified failed');
        }

        $company_data->token = '';
        $company_data->status = 1;
        $company_data->update();

        return redirect()->route('login')->with('success', 'Your email is verified successully');
    }
}
