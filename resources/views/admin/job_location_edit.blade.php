@extends('admin.layouts.app')

@section('heading', 'Edit Job Location')

@section('button')
    <a href="{{ route('admin_job_location') }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i>&nbsp; View
        All</a>
@endsection

@section('main_content')

    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">

                    <form action="{{ route('admin_job_location_update', $jobLocation->id) }}" method="POST">
                        @csrf

                        <div class="form-group mb-1">
                            <label class="mb-1">Location Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name', $jobLocation->name) }}">
                            @error('name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group text-end">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>
                                &nbsp;Update</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

@endsection
