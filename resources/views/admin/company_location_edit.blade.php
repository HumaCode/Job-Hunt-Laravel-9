@extends('admin.layouts.app')

@section('heading', 'Edit Company Location')

@section('button')
<a href="{{ route('admin_company_location') }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i>&nbsp; View
    All</a>
@endsection

@section('main_content')

<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-body">

                <form action="{{ route('admin_company_location_update', $companyLocation->id) }}" method="POST">
                    @csrf

                    <div class="form-group mb-1">
                        <label class="mb-1">Company Location</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name', $companyLocation->name) }}">
                    </div>
                    @error('name')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror

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