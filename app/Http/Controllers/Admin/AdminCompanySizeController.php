<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanySize;
use Illuminate\Http\Request;

class AdminCompanySizeController extends Controller
{
    public function index()
    {
        $company_sizes = CompanySize::orderBy('id', 'desc')->get();

        return view('admin.company_size', compact('company_sizes'));
    }

    public function create()
    {
        return view('admin.company_size_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|unique:company_sizes,name',
        ]);

        $companySize = new CompanySize();
        $companySize->name = $request->name;
        $companySize->save();

        return redirect()->route('admin_company_size')->with('success', 'Data is saved successfully.');
    }

    public function edit($id)
    {
        $companySize = CompanySize::findOrFail($id);

        return view('admin.company_size_edit', compact('companySize'));
    }

    public function update(Request $request, $id)
    {
        $companySize = CompanySize::where('id', $id)->first();

        $request->validate([
            'name'      => 'required|unique:company_sizes,name,' . $id,
        ]);

        $companySize->name = $request->name;
        $companySize->save();

        return redirect()->route('admin_company_size')->with('success', 'Data is updated successfully.');
    }

    public function delete($id)
    {
        CompanySize::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Data is deleted successfully.');
    }
}
