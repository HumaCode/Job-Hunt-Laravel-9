<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\PageContactItem;
use Illuminate\Http\Request;
use App\Mail\Websitemail;
use App\Models\Admin;

class ContactController extends Controller
{
    public function index()
    {
        $contact    = PageContactItem::where('id', 1)->first();

        return view('front.contact', compact('contact'));
    }

    public function submit(Request $request)
    {
        $admin_data = Admin::find(1);

        $request->validate([
            'person_name'       => 'required',
            'person_email'      => 'required',
            'person_message'    => 'required',
        ]);

        $subject        = 'Contact Form Message';
        $message        = 'Visitor Information <br>';
        $message        .= 'Name : ' . $request->person_name . '<br>';
        $message        .= 'Email : ' . $request->person_email . '<br>';
        $message        .= 'Message : ' . $request->person_message . '<br>';


        \Mail::to($admin_data->email)->send(new Websitemail($subject, $message));

        return back()->with('success', 'Email sent successfully, we will contact you soon.');
    }
}
