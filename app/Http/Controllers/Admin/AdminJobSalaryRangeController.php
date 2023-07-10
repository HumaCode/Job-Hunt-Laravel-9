<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobSalaryRange;
use Illuminate\Http\Request;

class AdminJobSalaryRangeController extends Controller
{
    public function index()
    {
        $job_salary_ranges = JobSalaryRange::orderBy('id', 'desc')->get();

        return view('admin.job_salary_range', compact('job_salary_ranges'));
    }

    public function create()
    {
        return view('admin.job_salary_range_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'range'      => 'required|unique:job_salary_ranges,range',
        ]);

        $jobSalaryRange = new JobSalaryRange();
        $jobSalaryRange->range = $request->range;
        $jobSalaryRange->save();

        return redirect()->route('admin_job_salary_range')->with('success', 'Data is saved successfully.');
    }

    public function edit($id)
    {
        $jobSalaryRange = JobSalaryRange::findOrFail($id);

        return view('admin.job_salary_range_edit', compact('jobSalaryRange'));
    }

    public function update(Request $request, $id)
    {
        $job_salary_range = JobSalaryRange::where('id', $id)->first();

        $request->validate([
            'range'      => 'required',
        ]);

        $job_salary_range->range = $request->range;
        $job_salary_range->save();

        return redirect()->route('admin_job_salary_range')->with('success', 'Data is updated successfully.');
    }

    public function delete($id)
    {
        JobSalaryRange::where('id', $id)->delete();

        return redirect()->route('admin_job_salary_range')->with('success', 'Data is deleted successfully.');
    }
}
