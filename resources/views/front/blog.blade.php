@extends('front.layouts.app')


@section('main_content')
<div class="page-top" style="background-image: url('uploads/banner.jpg')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Blog</h2>
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
                        <img src="{{ $item->photo == null ? asset('dist-front/uploads/banner1.jpg') : \Storage::url($item->photo) }}"
                            class="w_150" alt="">
                    </div>
                    <div class="text">
                        <h2>
                            <a href="post.html">{{ $item->title }}</a>
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