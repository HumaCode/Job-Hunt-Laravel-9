@extends('admin.layouts.app')

@section('heading', 'Page Job Category Content')


@section('main_content')

    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">

                    <form action="{{ route('admin_job_category_page_update') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-1">
                                    <label class="mb-1">Heading *</label>
                                    <input type="text" class="form-control @error('heading') is-invalid @enderror"
                                        name="heading" id="heading" value="{{ old('heading', $job_category->heading) }}">
                                    @error('heading')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-1">
                                    <label class="mb-1">Title *</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        name="title" id="title" value="{{ old('title', $job_category->title) }}">
                                    @error('title')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-1">
                            <label class="mb-1">Meta Description *</label>
                            <input type="text" class="form-control @error('meta_description') is-invalid @enderror"
                                name="meta_description" id="meta_description"
                                value="{{ old('meta_description', $job_category->meta_description) }}">
                            @error('meta_description')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group text-end my-2">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>
                                &nbsp; Update</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

@endsection
