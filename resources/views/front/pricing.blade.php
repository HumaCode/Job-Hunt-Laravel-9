@extends('front.layouts.app')


@section('seo_title')
    {{ $pricing_item->title }}
@endsection

@section('seo_meta_description')
    {{ $pricing_item->meta_description }}
@endsection

@section('main_content')
    <div class="page-top" style="background-image: url('{{ asset('dist-front/uploads/banner.jpg') }}')">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $pricing_item->heading }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content pricing">
        <div class="container">
            <div class="row pricing">

                @foreach ($packages as $package)
                    <div class="col-lg-4 mb_30">
                        <div class="card mb-5 mb-lg-0">
                            <div class="card-body">
                                <h2 class="card-title">{{ $package->package_name }}</h2>
                                <h3 class="card-price">${{ $package->package_price }}</h3>
                                <h4 class="card-day">({{ $package->package_days }} Days)</h4>
                                <hr />
                                <ul class="fa-ul">
                                    <li>
                                        <span class="fa-li"><i class="fas fa-check"></i></span>
                                        @if ($package->total_allowed_jobs == -1)
                                            Unlimited
                                        @else
                                            {{ $package->total_allowed_jobs }}
                                        @endif
                                        Job Post Allowed
                                    </li>
                                    <li>
                                        <span class="fa-li"><i
                                                class="fas 
                                            @if ($package->total_allowed_featured_jobs == -1 || $package->total_allowed_featured_jobs == 0) fa-times
                                        @else
                                        fa-check @endif
                                            "></i></span>
                                        @if ($package->total_allowed_featured_jobs == -1)
                                            Unlimited
                                        @elseif($package->total_allowed_featured_jobs == 0)
                                            No
                                        @else
                                            {{ $package->total_allowed_featured_jobs }}
                                        @endif
                                        Featured Job
                                    </li>
                                    <li>
                                        <span class="fa-li"><i
                                                class="fas  @if ($package->total_allowed_photos == -1 || $package->total_allowed_photos == 0) fa-times
                                            @else
                                            fa-check @endif"></i></span>
                                        @if ($package->total_allowed_photos == -1)
                                            Unlimited
                                        @elseif($package->total_allowed_photos == 0)
                                            No
                                        @else
                                            {{ $package->total_allowed_photos }}
                                        @endif
                                        Company Photos
                                    </li>
                                    <li>
                                        <span class="fa-li"><i
                                                class="fas @if ($package->total_allowed_videos == -1 || $package->total_allowed_videos == 0) fa-times
                                            @else
                                            fa-check @endif"></i></span>
                                        @if ($package->total_allowed_videos == -1)
                                            Unlimited
                                        @elseif($package->total_allowed_videos == 0)
                                            No
                                        @else
                                            {{ $package->total_allowed_videos }}
                                        @endif
                                        Company Videos
                                    </li>
                                </ul>
                                <div class="buy">
                                    <a href="{{ route('company_make_payment') }}" class="btn btn-primary">
                                        Choose Plan
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
