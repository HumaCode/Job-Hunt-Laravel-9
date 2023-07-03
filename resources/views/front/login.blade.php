@extends('front.layouts.app')

@section('seo_title')
{{ $page_other->login_page_title }}
@endsection

@section('seo_meta_description')
{{ $page_other->login_page_meta_description }}
@endsection

@section('main_content')
<div class="page-top" style="background-image: url('storage/uploads/banner.jpg')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2> {{ $page_other->login_page_heading }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                <div class="login-form">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">
                                <i class="far fa-user"></i> Candidate
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">
                                <i class="fas fa-briefcase"></i>
                                Company
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab" tabindex="0">
                            <div class="mb-3">
                                <label for="" class="form-label">Username</label>
                                <input type="text" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Password</label>
                                <input type="password" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary bg-website">
                                    Login
                                </button>
                                <a href="forget-password.html" class="primary-color">Forget Password?</a>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab" tabindex="0">
                            <div class="mb-3">
                                <label for="" class="form-label">Username</label>
                                <input type="text" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Password</label>
                                <input type="password" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary bg-website">
                                    Login
                                </button>
                                <a href="forget-password.html" class="primary-color">Forget Password?</a>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <a href="{{ route('signup') }}" class="primary-color">Don't have an account? Create Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection