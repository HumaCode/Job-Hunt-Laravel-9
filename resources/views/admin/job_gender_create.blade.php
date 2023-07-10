@extends('admin.layouts.app')

@section('heading', 'Add Job Gender')

@section('button')
<a href="{{ route('admin_job_gender') }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i>&nbsp; View
    All</a>
@endsection

@section('main_content')

<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-body">

                <form action="{{ route('admin_job_gender_store') }}" method="POST">
                    @csrf

                    <div class="form-group mb-1">
                        <label class="mb-1">Job Gender</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" autofocus>
                        @error('name')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="form-group text-end">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>
                            &nbsp;Submit</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>

@endsection