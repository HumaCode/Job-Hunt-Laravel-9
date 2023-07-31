@extends('front.layouts.app')


@section('seo_title')
{{-- {{ $faq->title }} --}}
@endsection

@section('seo_meta_description')
{{-- {{ $faq->meta_description }} --}}
@endsection

@section('main_content')
<div class="page-top" style="background-image: url('{{ asset('dist-front/uploads/banner.jpg') }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Company Photo</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content user-panel">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                @include('company.sidebar')
            </div>
            <div class="col-lg-9 col-md-12">

                <h4>Add Photo</h4>
                <form action="{{ route('company_photos_submit') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <input type="file" name="photo" />
                            </div>
                            <small class="text-danger">Photo size must be 1400 x 800 pixels</small>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-sm" value="Submit" />
                        </div>
                    </div>
                </form>

                <h4 class="mt-4">Existing Photos</h4>
                <div class="photo-all">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="item">
                                <a href="{{ asset('dist-front') }}/uploads/photo1.jpg" class="magnific">
                                    <img src="{{ asset('dist-front') }}/uploads/photo1.jpg" alt="" />
                                    <div class="icon">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                    <div class="bg"></div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="item">
                                <a href="{{ asset('dist-front') }}/uploads/photo2.jpg" class="magnific">
                                    <img src="{{ asset('dist-front') }}/uploads/photo2.jpg" alt="" />
                                    <div class="icon">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                    <div class="bg"></div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="item">
                                <a href="{{ asset('dist-front') }}/uploads/photo3.jpg" class="magnific">
                                    <img src="{{ asset('dist-front') }}/uploads/photo3.jpg" alt="" />
                                    <div class="icon">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                    <div class="bg"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection