<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminProfileController extends Controller
{
    public function admin_profile()
    {
        $profile = Admin::findOrFail(auth()->user()->id);

        return view('admin.profile', compact('profile'));
    }

    public function profile_submit(Request $request)
    {
        $id = $request->id;
        $admin_data = Admin::findOrFail($id);

        $request->validate([
            'name'      => 'required',
            'email'     => 'required|unique:admins,email,' . $id,
        ]);

        if ($request->password != '') {
            $request->validate([
                'password'          => 'required',
                'retype_password'   => 'required|same:password',
            ]);

            $admin_data->password = Hash::make($request->password);
        }

        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
            ]);

            if ($admin_data->photo != null) {
                // unlink
                Storage::delete($admin_data->photo);
            }

            $admin_data->photo = $request->file('photo')->store('public/img');
        }

        $admin_data->name   = $request->name;
        $admin_data->email  = $request->email;
        $admin_data->update();

        return redirect()->back()->with('success', 'Profile information is saved successfully.');
    }
}
