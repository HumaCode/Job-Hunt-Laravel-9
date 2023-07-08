@extends('front.layouts.app')

@section('seo_title')
    {{ $page_blog->title }}
@endsection

@section('seo_meta_description')
    {{ $page_blog->meta_description }}
@endsection

@section('main_content')
    <div class="page-top" style="background-image: url('{{ asset('dist-front/uploads/banner.jpg') }}')">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $page_blog->heading }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="blog">
        <div class="container">
            <div class="row">

                @foreach ($posts as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="item">
                            <div class="photo">
                                <a href="{{ route('blog_single', $item->slug) }}">
                                    <img src="{{ $item->photo == null ? asset('dist-front/uploads/banner1.jpg') : \Storage::url($item->photo) }}"
                                        class="w_150" alt="">
                                </a>
                            </div>
                            <div class="text">
                                <h2>
                                    <a href="{{ route('blog_single', $item->slug) }}">{{ $item->heading }}</a>
                                </h2>
                                <div class="short-des">
                                    <p>
                                        {{ $item->short_description }}
                                    </p>
                                </div>
                                <div class="button">
                                    <a href="{{ route('blog_single', $item->slug) }}" class="btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="row justify-content-center">
                    <div class="col-md-12">
                        {{ $posts->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
