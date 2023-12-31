@extends('admin.layouts.app')

@section('heading', 'Other Page Content')

<style>

</style>

@section('main_content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('admin_other_page_update') }}" method="POST">
                        @csrf

                        <div class="row ">

                            <div class="col-lg-3 col-md-6">
                                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">
                                    <button class="nav-link active mb-1" id="v-pills-1-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-1" type="button" role="tab" aria-controls="v-pills-1"
                                        aria-selected="true">Login Page</button>
                                    <button class="nav-link mb-1" id="v-pills-2-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-2" type="button" role="tab" aria-controls="v-pills-2"
                                        aria-selected="false">Signup Page</button>
                                    <button class="nav-link mb-1" id="v-pills-3-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-3" type="button" role="tab" aria-controls="v-pills-3"
                                        aria-selected="false">Forget Password</button>

                                </div>
                            </div>
                            <div class="col-lg-9 col-md-6">
                                <div class="tab-content" id="v-pills-tabContent">

                                    {{-- login --}}
                                    <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel"
                                        aria-labelledby="v-pills-1-tab" tabindex="0">

                                        <div class="row">

                                            <div class="col-lg-12">

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-4">
                                                            <label class="form-label" for="login_page_heading">Heading
                                                                *</label>
                                                            <input type="text" class="form-control"
                                                                name="login_page_heading"
                                                                value="{{ $page_other->login_page_heading }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-4">
                                                            <label class="form-label " for="login_page_title">Title
                                                                *</label>
                                                            <input type="text" class="form-control"
                                                                name="login_page_title"
                                                                value="{{ $page_other->login_page_title }}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-4">
                                                    <label for="floatingTextarea2" class="form-label">Meta Description
                                                        *</label>
                                                    <textarea class="form-control" name="login_page_meta_description" id="floatingTextarea2" style="height: 100px">{{ $page_other->login_page_meta_description }}</textarea>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    {{-- signup --}}
                                    <div class="tab-pane fade" id="v-pills-2" role="tabpanel"
                                        aria-labelledby="v-pills-2-tab" tabindex="0">

                                        <div class="row">

                                            <div class="col-lg-12">

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-4">
                                                            <label class="form-label" for="signup_page_heading">Heading
                                                                *</label>
                                                            <input type="text" class="form-control"
                                                                name="signup_page_heading"
                                                                value="{{ $page_other->signup_page_heading }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-4">
                                                            <label class="form-label " for="signup_page_title">Title
                                                                *</label>
                                                            <input type="text" class="form-control"
                                                                name="signup_page_title"
                                                                value="{{ $page_other->signup_page_title }}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-4">
                                                    <label for="floatingTextarea2" class="form-label">Meta Description
                                                        *</label>
                                                    <textarea class="form-control" name="signup_page_meta_description" id="floatingTextarea2" style="height: 100px">{{ $page_other->signup_page_meta_description }}</textarea>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    {{-- forget password --}}
                                    <div class="tab-pane fade" id="v-pills-3" role="tabpanel"
                                        aria-labelledby="v-pills-3-tab" tabindex="0">

                                        <div class="row">

                                            <div class="col-lg-12">

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-4">
                                                            <label class="form-label"
                                                                for="forget_password_page_heading">Heading
                                                                *</label>
                                                            <input type="text" class="form-control"
                                                                name="forget_password_page_heading"
                                                                value="{{ $page_other->forget_password_page_heading }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-4">
                                                            <label class="form-label "
                                                                for="forget_password_page_title">Title
                                                                *</label>
                                                            <input type="text" class="form-control"
                                                                name="forget_password_page_title"
                                                                value="{{ $page_other->forget_password_page_title }}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-4">
                                                    <label for="floatingTextarea2" class="form-label">Meta Description
                                                        *</label>
                                                    <textarea class="form-control" name="forget_password_page_meta_description" id="floatingTextarea2"
                                                        style="height: 100px">{{ $page_other->forget_password_page_meta_description }}</textarea>
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
