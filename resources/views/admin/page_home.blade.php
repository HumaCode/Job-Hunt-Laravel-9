@extends('admin.layouts.app')

@section('heading', 'Home Page Content')

<style>

</style>

@section('main_content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('admin_home_page_update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row ">

                            <div class="col-lg-3 col-md-6">
                                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">
                                    <button class="nav-link active mb-1" id="v-pills-1-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-1" type="button" role="tab" aria-controls="v-pills-1"
                                        aria-selected="true">Search</button>
                                    <button class="nav-link mb-1" id="v-pills-2-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-2" type="button" role="tab" aria-controls="v-pills-2"
                                        aria-selected="false">Job Category</button>
                                    <button class="nav-link mb-1" id="v-pills-3-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-3" type="button" role="tab" aria-controls="v-pills-3"
                                        aria-selected="false">Why Choose Item</button>
                                    <button class="nav-link mb-1" id="v-pills-4-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-4" type="button" role="tab" aria-controls="v-pills-4"
                                        aria-selected="false">Feature Job</button>
                                    <button class="nav-link mb-1" id="v-pills-5-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-5" type="button" role="tab" aria-controls="v-pills-5"
                                        aria-selected="false">Testimonial</button>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-6">
                                <div class="tab-content" id="v-pills-tabContent">

                                    {{-- search --}}
                                    <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel"
                                        aria-labelledby="v-pills-1-tab" tabindex="0">

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
                                                                *</label> <br>
                                                            <img src="{{ $page_home_data->background == null ? asset('dist/img/noimage.png') : \Storage::url($page_home_data->background) }}"
                                                                alt="" class="profile-photo w_200"
                                                                id="showImage">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-4">
                                                            <label class="form-label" for="text">Change Background
                                                                *</label>
                                                            <input type="file" class="form-control" name="background"
                                                                id="photo">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    {{-- job category --}}
                                    <div class="tab-pane fade" id="v-pills-2" role="tabpanel"
                                        aria-labelledby="v-pills-2-tab" tabindex="0">

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-4">
                                                    <label class="form-label " for="job_category_heading">Category Heading
                                                        *</label>
                                                    <input type="text" class="form-control"
                                                        name="job_category_heading"
                                                        value="{{ $page_home_data->job_category_heading }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-4">
                                                    <label class="form-label " for="job_category_subheading">Sub Heading
                                                    </label>
                                                    <input type="text" class="form-control"
                                                        name="job_category_subheading"
                                                        value="{{ $page_home_data->job_category_subheading }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-4">
                                                    <label class="form-label " for="job_category_status">Status
                                                        *</label>
                                                    <select name="job_category_status" id="job_category_status"
                                                        class="form-control">
                                                        <option selected disabled> -- Choose --</option>
                                                        <option value="Show"
                                                            {{ $page_home_data->job_category_status == 'Show' ? 'selected' : '' }}>
                                                            Show
                                                        </option>
                                                        <option value="Hide"
                                                            {{ $page_home_data->job_category_status == 'Hide' ? 'selected' : '' }}>
                                                            Hide
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    {{-- why choose --}}
                                    <div class="tab-pane fade" id="v-pills-3" role="tabpanel"
                                        aria-labelledby="v-pills-3-tab" tabindex="0">

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-4">
                                                    <label class="form-label " for="why_choose_heading">Why Choose Heading
                                                        *</label>
                                                    <input type="text" class="form-control" name="why_choose_heading"
                                                        value="{{ $page_home_data->why_choose_heading }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-4">
                                                    <label class="form-label " for="why_choose_subheading">Why Choose Sub
                                                        Heading *
                                                    </label>
                                                    <input type="text" class="form-control"
                                                        name="why_choose_subheading"
                                                        value="{{ $page_home_data->why_choose_subheading }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-4">
                                                    <label class="form-label " for="why_choose_status">Status
                                                        *</label>
                                                    <select name="why_choose_status" id="why_choose_status"
                                                        class="form-control">
                                                        <option selected disabled> -- Choose --</option>
                                                        <option value="Show"
                                                            {{ $page_home_data->why_choose_status == 'Show' ? 'selected' : '' }}>
                                                            Show
                                                        </option>
                                                        <option value="Hide"
                                                            {{ $page_home_data->why_choose_status == 'Hide' ? 'selected' : '' }}>
                                                            Hide
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-4">
                                                    <label class="form-label" for="text">Existing Background
                                                        *</label> <br>
                                                    <img src="{{ $page_home_data->why_choose_background == null ? asset('dist/img/noimage.png') : \Storage::url($page_home_data->why_choose_background) }}"
                                                        alt="" class="profile-photo w_200" id="showImage2">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-4">
                                                    <label class="form-label" for="text">Change Background *</label>
                                                    <input type="file" class="form-control"
                                                        name="why_choose_background" id="photo2">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    {{-- feature job --}}
                                    <div class="tab-pane fade" id="v-pills-4" role="tabpanel"
                                        aria-labelledby="v-pills-4-tab" tabindex="0">

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-4">
                                                    <label class="form-label " for="feature_jobs_heading">Feature Job
                                                        Heading
                                                        *</label>
                                                    <input type="text" class="form-control"
                                                        name="feature_jobs_heading"
                                                        value="{{ $page_home_data->feature_jobs_heading }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-4">
                                                    <label class="form-label " for="feature_jobs_subheading">Sub Heading
                                                    </label>
                                                    <input type="text" class="form-control"
                                                        name="feature_jobs_subheading"
                                                        value="{{ $page_home_data->feature_jobs_subheading }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-4">
                                                    <label class="form-label " for="feature_jobs_status">Status
                                                        *</label>
                                                    <select name="feature_jobs_status" id="feature_jobs_status"
                                                        class="form-control">
                                                        <option selected disabled> -- Choose --</option>
                                                        <option value="Show"
                                                            {{ $page_home_data->feature_jobs_status == 'Show' ? 'selected' : '' }}>
                                                            Show
                                                        </option>
                                                        <option value="Hide"
                                                            {{ $page_home_data->feature_jobs_status == 'Hide' ? 'selected' : '' }}>
                                                            Hide
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    {{-- testimonial --}}
                                    <div class="tab-pane fade" id="v-pills-5" role="tabpanel"
                                        aria-labelledby="v-pills-5-tab" tabindex="0">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-4">
                                                    <label class="form-label " for="testimonial_heading">Testimonial
                                                        Heading
                                                        *</label>
                                                    <input type="text" class="form-control" name="testimonial_heading"
                                                        value="{{ $page_home_data->testimonial_heading }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-4">
                                                    <label class="form-label " for="testimonial_status">Status
                                                        *</label>
                                                    <select name="testimonial_status" id="testimonial_status"
                                                        class="form-control">
                                                        <option selected disabled> -- Choose --</option>
                                                        <option value="Show"
                                                            {{ $page_home_data->testimonial_status == 'Show' ? 'selected' : '' }}>
                                                            Show
                                                        </option>
                                                        <option value="Hide"
                                                            {{ $page_home_data->testimonial_status == 'Hide' ? 'selected' : '' }}>
                                                            Hide
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-4">
                                                    <label class="form-label" for="text">Existing Background
                                                        *</label> <br>
                                                    <img src="{{ $page_home_data->testimonial_background == null ? asset('dist/img/noimage.png') : \Storage::url($page_home_data->testimonial_background) }}"
                                                        alt="" class="profile-photo w_200" id="showImage3">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-4">
                                                    <label class="form-label" for="text">Change Background *</label>
                                                    <input type="file" class="form-control"
                                                        name="testimonial_background" id="photo3">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="mb-4 text-end">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>


                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
