<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyLocation;
use Illuminate\Http\Request;

class AdminCompanyLocationController extends Controller
{
    public function index()
    {
        $company_locations = CompanyLocation::orderBy('id', 'desc')->get();

        return view('admin.company_location', compact('company_locations'));
    }

    public function create()
    {
        return view('admin.company_location_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|unique:company_locations,name',
        ]);

        $companyLocation = new CompanyLocation();
        $companyLocation->name = $request->name;
        $companyLocation->save();

        return redirect()->route('admin_company_location')->with('success', 'Data is saved successfully.');
    }

    public function edit($id)
    {
        $companyLocation = CompanyLocation::findOrFail($id);

        return view('admin.company_location_edit', compact('companyLocation'));
    }

    public function update(Request $request, $id)
    {
        $companyLocation = CompanyLocation::where('id', $id)->first();

        $request->validate([
            'name'      => 'required|unique:company_locations,name,' . $id,
        ]);

        $companyLocation->name = $request->name;
        $companyLocation->save();

        return redirect()->route('admin_company_location')->with('success', 'Data is updated successfully.');
    }

    public function delete($id)
    {
        CompanyLocation::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Data is deleted successfully.');
    }
}
