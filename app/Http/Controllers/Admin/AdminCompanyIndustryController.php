<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyIndustry;
use Illuminate\Http\Request;

class AdminCompanyIndustryController extends Controller
{
    public function index()
    {
        $company_industries = CompanyIndustry::orderBy('id', 'desc')->get();

        return view('admin.company_industry', compact('company_industries'));
    }

    public function create()
    {
        return view('admin.company_industry_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|unique:company_industries,name',
        ]);

        $companyIndustry = new CompanyIndustry();
        $companyIndustry->name = $request->name;
        $companyIndustry->save();

        return redirect()->route('admin_company_industry')->with('success', 'Data is saved successfully.');
    }

    public function edit($id)
    {
        $companyIndustry = CompanyIndustry::findOrFail($id);

        return view('admin.company_industry_edit', compact('companyIndustry'));
    }

    public function update(Request $request, $id)
    {
        $companyIndustry = CompanyIndustry::where('id', $id)->first();

        $request->validate([
            'name'      => 'required|unique:company_industries,name,' . $id,
        ]);

        $companyIndustry->name = $request->name;
        $companyIndustry->save();

        return redirect()->route('admin_company_industry')->with('success', 'Data is updated successfully.');
    }

    public function delete($id)
    {
        CompanyIndustry::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Data is deleted successfully.');
    }
}
