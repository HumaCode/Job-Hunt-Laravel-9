@extends('admin.layouts.app')

@section('heading', 'Add Post')

@section('button')
    <a href="{{ route('admin_post') }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i>&nbsp; View
        All</a>
@endsection

@section('main_content')

    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">

                    <form action="{{ route('admin_post_store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-1">
                                    <label class="mb-1">Title *</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        name="title" value="{{ old('title') }}">
                                    @error('title')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-1">
                                    <label class="mb-1">Slug *</label>
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                        name="slug" value="{{ old('slug') }}">
                                    @error('slug')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-1">
                            <label class="mb-1">Short Description *</label>

                            <textarea name="short_description" id="short_description"
                                class="form-control h_100 @error('short_description') is-invalid @enderror" rows="5">{{ old('short_description') }}</textarea>
                            @error('short_description')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-1">
                            <label class="mb-1">Description *</label>

                            <textarea name="description" id="description"
                                class="form-control h_100 editor @error('description') is-invalid @enderror" rows="5">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="row my-4">
                            <div class="col-md-6">
                                <div class="">
                                    <label class="form-label" for="photo">Photo
                                        *</label> <br>
                                    {{-- <img src="{{ $page_home_data->why_choose_background == null ? asset('dist/img/noimage.png') : \Storage::url($page_home_data->why_choose_background) }}"
                                        alt="" class="profile-photo w_100_p" id="showImage2"> --}}
                                    <img src="{{ asset('dist/img/noimage.png') }}" alt=""
                                        class="profile-photo w_200" id="showImage">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
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

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#photo').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        })
    </script>
@endpush
