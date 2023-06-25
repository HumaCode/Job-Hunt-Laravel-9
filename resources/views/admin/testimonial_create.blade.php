@extends('admin.layouts.app')

@section('heading', 'Add Testimonial')

@section('button')
    <a href="{{ route('admin_testimonial') }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i>&nbsp; View
        All</a>
@endsection

@section('main_content')

    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">

                    <form action="{{ route('admin_testimonial_store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label" for="photo">Photo
                                        *</label> <br>
                                    {{-- <img src="{{ $page_home_data->why_choose_background == null ? asset('dist/img/noimage.png') : \Storage::url($page_home_data->why_choose_background) }}"
                                        alt="" class="profile-photo w_100_p" id="showImage2"> --}}
                                    <img src="{{ asset('dist/img/noimage.png') }}" alt=""
                                        class="profile-photo w_200" id="showImage">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label" for="photo">Change Photo </label>
                                    <input type="file" class="form-control" name="photo" id="photo">
                                </div>
                            </div>
                        </div>



                        <div class="form-group mb-1">
                            <label class="mb-1">Designation *</label>
                            <input type="text" class="form-control @error('designation') is-invalid @enderror"
                                name="designation" value="{{ old('designation') }}">
                        </div>
                        @error('designation')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror

                        <div class="form-group mb-1">
                            <label class="mb-1">Comment *</label>

                            <textarea name="text" id="text" class="form-control h_100 @error('comment') is-invalid @enderror"
                                rows="5">{{ old('comment') }}</textarea>
                        </div>
                        @error('comment')
                            <span class="comment-danger">
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
