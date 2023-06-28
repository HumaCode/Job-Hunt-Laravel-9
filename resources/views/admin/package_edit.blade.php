@extends('admin.layouts.app')

@section('heading', 'Edit Package')

@section('button')
    <a href="{{ route('admin_package') }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i>&nbsp; View
        All</a>
@endsection

@section('main_content')

    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">

                    <form action="{{ route('admin_package_update', $package->id) }}" method="POST">
                        @csrf


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-1">

                                    <label class="mb-1">Package Name *</label>
                                    <input type="text" class="form-control @error('package_name') is-invalid @enderror"
                                        name="package_name" value="{{ old('package_name', $package->package_name) }}">
                                    @error('package_name')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-1">

                                    <label class="mb-1">Package Price *</label>
                                    <input type="text" class="form-control @error('package_price') is-invalid @enderror"
                                        name="package_price" value="{{ old('package_price', $package->package_price) }}">
                                    @error('package_price')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-1">

                                    <label class="mb-1">Number of Days *</label>
                                    <input type="number" min="0"
                                        class="form-control @error('package_days') is-invalid @enderror" name="package_days"
                                        value="{{ old('package_days', $package->package_days) }}">
                                    @error('package_days')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-1">

                                    <label class="mb-1">Display Time *</label>
                                    <input type="text"
                                        class="form-control @error('package_display_time') is-invalid @enderror"
                                        name="package_display_time"
                                        value="{{ old('package_display_time', $package->package_display_time) }}">
                                    @error('package_display_time')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-1">
                                    <label class="mb-1">Total Allowed Jobs *</label>
                                    <input type="number"
                                        class="form-control @error('total_allowed_jobs') is-invalid @enderror"
                                        name="total_allowed_jobs"
                                        value="{{ old('total_allowed_jobs', $package->total_allowed_jobs) }}">
                                    @error('total_allowed_jobs')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-1">
                                    <label class="mb-1">Total Allowed Featured Jobs *</label>
                                    <input type="number" min="0"
                                        class="form-control @error('total_allowed_featured_jobs') is-invalid @enderror"
                                        name="total_allowed_featured_jobs"
                                        value="{{ old('total_allowed_featured_jobs', $package->total_allowed_featured_jobs) }}">
                                    @error('total_allowed_featured_jobs')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-1">
                                    <label class="mb-1">Total Allowed Photos *</label>
                                    <input type="number" min="0"
                                        class="form-control @error('total_allowed_photos') is-invalid @enderror"
                                        name="total_allowed_photos"
                                        value="{{ old('total_allowed_photos', $package->total_allowed_photos) }}">
                                    @error('total_allowed_photos')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-1">
                                    <label class="mb-1">Total Allowed Videos *</label>
                                    <input type="number" min="0"
                                        class="form-control @error('total_allowed_videos') is-invalid @enderror"
                                        name="total_allowed_videos"
                                        value="{{ old('total_allowed_videos', $package->total_allowed_videos) }}">
                                    @error('total_allowed_videos')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
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
