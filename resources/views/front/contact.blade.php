@extends('front.layouts.app')


@section('seo_title')
    {{ $contact->title }}
@endsection

@section('seo_meta_description')
    {{ $contact->meta_description }}
@endsection

@section('main_content')
    <div class="page-top" style="background-image: url('{{ asset('dist-front/uploads/banner.jpg') }}')">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2> {{ $contact->heading }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="contact-form">
                        <form action="{{ route('contact_submit') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="" class="form-label">Name</label>
                                <input type="text" class="form-control @error('person_name') is-invalid @enderror"
                                    name="person_name" />
                                @error('person_name')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Email Address</label>
                                <input type="text" class="form-control @error('person_email') is-invalid @enderror"
                                    name="person_email" />
                                @error('person_email')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Message</label>
                                <textarea class="form-control @error('person_message') is-invalid @enderror" rows="3" name="person_message"></textarea>
                                @error('person_message')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary bg-website">
                                    Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="map">
                        {!! $contact->map_code !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
