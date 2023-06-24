@extends('admin.layouts.app')

@section('heading', 'Home Page Content')

<style>

</style>

@section('main_content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">


                    <div class="row ">

                        <div class="col-lg-3 col-md-6">
                            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <button class="nav-link active mb-1" id="v-pills-1-tab" data-bs-toggle="pill"
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

                                    <form action="{{ route('admin_home_page_update') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-4">
                                                    <label class="form-label " for="heading">Heading *</label>
                                                    <input type="text" class="form-control" name="heading"
                                                        value="{{ $page_home_data->heading }}">
                                                </div>

                                                <div class="mb-4">
                                                    <label for="floatingTextarea2">Text *</label>
                                                    <textarea class="form-control" name="text" id="floatingTextarea2" style="height: 100px">{{ $page_home_data->text }}</textarea>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-4">
                                                            <label class="form-label " for="job_title">Job Title *</label>
                                                            <input type="text" class="form-control" name="job_title"
                                                                value="{{ $page_home_data->job_title }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-4">
                                                            <label class="form-label " for="job_location">Job Location
                                                                *</label>
                                                            <input type="text" class="form-control" name="job_location"
                                                                value="{{ $page_home_data->job_location }}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-4">
                                                            <label class="form-label" for="job_category">Job Category
                                                                *</label>
                                                            <input type="text" class="form-control" name="job_category"
                                                                value="{{ $page_home_data->job_category }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-4">
                                                            <label class="form-label " for="search">Search *</label>
                                                            <input type="text" class="form-control" name="search"
                                                                value="{{ $page_home_data->search }}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-4">
                                                            <label class="form-label" for="text">Existing Background
                                                                *</label>
                                                            <img src="{{ $page_home_data->background == null ? asset('dist/img/noimage.png') : \Storage::url($page_home_data->background) }}"
                                                                alt="" class="profile-photo w_100_p" id="showImage">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-4">
                                                    <label class="form-label" for="text">Change Background *</label>
                                                    <input type="file" class="form-control" name="background"
                                                        id="photo">
                                                </div>

                                                <div class="mb-4">
                                                    <label class="form-label"></label>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>

                                <div class="tab-pane fade" id="v-pills-2" role="tabpanel"
                                    aria-labelledby="v-pills-2-tab" tabindex="0">...
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
