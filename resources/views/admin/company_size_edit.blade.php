@extends('admin.layouts.app')

@section('heading', 'Edit Company Size')

@section('button')
<a href="{{ route('admin_company_size') }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i>&nbsp; View
    All</a>
@endsection

@section('main_content')

<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-body">

                <form action="{{ route('admin_company_size_update', $companySize->id) }}" method="POST">
                    @csrf

                    <div class="form-group mb-1">
                        <label class="mb-1">Company Size</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name', $companySize->name) }}">
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