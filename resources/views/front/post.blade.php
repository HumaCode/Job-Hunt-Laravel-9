@extends('front.layouts.app')


@section('main_content')

<div class="page-top" style="background-image: url('{{ asset('dist-front/uploads/banner.jpg') }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $post->title }}</h2>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript"
    src="https://platform-api.sharethis.com/js/sharethis.js#property=5993ef01e2587a001253a261&product=inline-share-buttons"
    async="async"></script>

<div class="page-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12">
                <div class="featured-photo">
                    <img src="{{ $post->photo == null ? asset('dist-front/uploads/banner1.jpg') : \Storage::url($post->photo) }}"
                        alt="" />
                </div>
                <div class="sub">
                    <div class="item">
                        <b><i class="fa fa-clock-o"></i></b>
                        25 February, 2022
                    </div>
                    <div class="item">
                        <b><i class="fa fa-eye"></i></b>
                        {{ $post->total_view }}
                    </div>
                </div>
                <div class="main-text">
                    {!! $post->description !!}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection