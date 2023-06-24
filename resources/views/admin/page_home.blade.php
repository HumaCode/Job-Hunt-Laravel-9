@extends('admin.layouts.app')

@section('heading', 'Home Page Content')

<style>

</style>

@section('main_content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_profile_submit') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row cs-tab">

                            <div class="col-lg-3 col-md-6">
                                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">
                                    <button class="nav-link active" id="v-pills-1-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-1" type="button" role="tab" aria-controls="v-pills-1"
                                        aria-selected="true">Search</button>
                                    <button class="nav-link" id="v-pills-2-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-2" type="button" role="tab" aria-controls="v-pills-2"
                                        aria-selected="false">Category</button>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-6">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel"
                                        aria-labelledby="v-pills-1-tab" tabindex="0">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label " for="heading">Heading *</label>
                                                    <input type="text" class="form-control" name="heading"
                                                        value="">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label" for="text">Text *</label>
                                                    <textarea name="text" id="text" class="form-control h-100" rows="5">Search the best, perfect and suitable jobs that matches your skills in your expertise area.</textarea>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-4">
                                                            <label class="form-label " for="title">Job Title *</label>
                                                            <input type="text" class="form-control" name="title"
                                                                value="Job Title">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-4">
                                                            <label class="form-label " for="title">Job Location *</label>
                                                            <input type="text" class="form-control" name="title"
                                                                value="Job Location">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-4">
                                                            <label class="form-label " for="title">Job Category *</label>
                                                            <input type="text" class="form-control" name="title"
                                                                value="Job Category">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-4">
                                                            <label class="form-label " for="title">Search *</label>
                                                            <input type="text" class="form-control" name="title"
                                                                value="Search">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-4">
                                                            <label class="form-label" for="text">Existing Background
                                                                *</label>

                                                            <img src="{{ \Storage::url('uploads/banner_home.jpg') }}"
                                                                alt="" class="img-thumbnail" id="showImage">
                                                            {{-- <img
                                                            src="{{ ($profile->photo == null) ? asset('dist/img/user.png') : \Storage::url($profile->photo) }}"
                                                            alt="" class="profile-photo w_100_p" id="showImage"> --}}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-4">
                                                    <label class="form-label" for="text">Change Background *</label>
                                                    <input type="file" class="form-control" name="photo">
                                                    {{-- <img
                                                    src="{{ ($profile->photo == null) ? asset('dist/img/user.png') : \Storage::url($profile->photo) }}"
                                                    alt="" class="profile-photo w_100_p" id="showImage"> --}}
                                                </div>

                                                <div class="mb-4">
                                                    <label class="form-label"></label>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="v-pills-2" role="tabpanel"
                                        aria-labelledby="v-pills-2-tab" tabindex="0">...
                                    </div>
                                </div>
                            </div>


                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
