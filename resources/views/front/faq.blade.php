@extends('front.layouts.app')


@section('seo_title')
{{ $faq->title }}
@endsection

@section('seo_meta_description')
{{ $faq->meta_description }}
@endsection

@section('main_content')

<div class="page-top" style="background-image: url('{{ asset('dist-front/uploads/banner.jpg') }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $faq->heading }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content faq">
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                <div class="accordion" id="accordionExample">

                    @foreach ($faqs as $item)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{ $item->id }}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $item->id }}" aria-expanded="false"
                                aria-controls="collapse{{ $item->id }}">
                                {{ $item->question }}
                            </button>
                        </h2>
                        <div id="collapse{{ $item->id }}" class="accordion-collapse collapse"
                            aria-labelledby="heading{{ $item->id }}" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                {!! $item->answer !!}
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</div>

@endsection