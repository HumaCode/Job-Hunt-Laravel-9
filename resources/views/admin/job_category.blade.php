@extends('admin.layouts.app')

@section('heading', 'Job Category')

@section('button')
<a href="{{ route('admin_job_category_create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>&nbsp; Add
    Category</a>
@endsection



@section('main_content')

<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" id="example1">
                        <thead class="text-center">
                            <tr>
                                <th width="5%">SL</th>
                                <th>Category Name</th>
                                <th>Category Icon</th>
                                <th>Icon Preview</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($job_categories as $item)
                            <tr>
                                <td>{{ $loop->iteration }}.</td>
                                <td>{{ $item->name }}</td>
                                <td width="15%">{{ $item->icon }}</td>
                                <td width="15%" class="text-center"><i class="{{ $item->icon }} fs-2"></i></td>
                                <td class="pt_10 pb_10 text-center">
                                    <a href="{{ route('admin_job_category_edit', $item->id) }}"
                                        class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i>
                                        &nbsp; Edit</a> &nbsp;
                                    <a href="{{ route('admin_job_category_delete', $item->id) }}"
                                        class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');"><i
                                            class="fas fa-trash"></i>
                                        &nbsp;Delete</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection