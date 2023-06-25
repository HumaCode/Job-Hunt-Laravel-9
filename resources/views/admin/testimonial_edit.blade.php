@extends('admin.layouts.app')

@section('heading', 'Edit Testimonial')

@section('button')
    <a href="{{ route('admin_testimonial') }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i>&nbsp; View
        All</a>
@endsection

@section('main_content')

    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">

                    <form action="{{ route('admin_testimonial_update', $testimonial->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label" for="photo">Photo
                                        *</label> <br>

                                    <img src="{{ \Storage::url($testimonial->photo) }}" alt=""
                                        class="profile-photo w_200" id="showImage">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label" for="photo">Change Photo </label>
                                    <input type="file" class="form-control  @error('photo') is-invalid @enderror"
                                        name="photo" id="photo" accept=".jpg,.png">
                                    @error('photo')
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
                                    <label class="mb-1">Name *</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name', $testimonial->name) }}">
                                    @error('name')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-1">
                                    <label class="mb-1">Designation *</label>
                                    <input type="text" class="form-control @error('designation') is-invalid @enderror"
                                        name="designation" value="{{ old('designation', $testimonial->designation) }}">
                                    @error('designation')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-1">
                            <label class="mb-1">Comment *</label>

                            <textarea name="comment" id="comment" class="form-control h_100 @error('comment') is-invalid @enderror"
                                rows="5">{{ old('comment', $testimonial->comment) }}</textarea>
                        </div>
                        @error('comment')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror

                        <div class="form-group text-end my-2">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>
                                &nbsp;Submit</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

@endsection
