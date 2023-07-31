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

                        @forelse ($photos as $item)
                        <div class="col-md-6 col-lg-3">
                            <div class="item mb-1">
                                <a href="{{ \Storage::url($item->photo) }}" class="magnific">
                                    <img src="{{ \Storage::url($item->photo) }}" alt="Company Photos" />
                                    <div class="icon">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                    <div class="bg"></div>
                                </a>
                            </div>
                            <a href="{{ route('company_photos_delete', $item->id) }}"
                                class="btn btn-danger btn-sm mt-0 mb-1" onclick="return confirm('Are you sure.?')">
                                Delete</a>
                            <hr>
                        </div>
                        @empty
                        <div class="alert alert-danger text-center">
                            Data Not Found
                        </div>
                        @endforelse

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection