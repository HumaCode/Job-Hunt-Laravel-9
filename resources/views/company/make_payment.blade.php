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
                    <h2>Make Payment</h2>
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
                    <h4>Current Plan</h4>
                    <div class="row box-items mb-4">
                        <div class="col-md-4">
                            <div class="box1">
                                @if ($current_plan == null)
                                    <strong class="text-danger">No plan is available</strong>
                                @else
                                    <h4>${{ $current_plan->rPackage->package_price }}</h4>
                                    <p>{{ $current_plan->rPackage->package_name }}</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <h4>Choose Plan and Make Payment</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">

                            <form action="{{ route('company_paypal') }}" method="POST">
                                @csrf
                                <tr>
                                    <td class="w-400">
                                        <select name="package_id" id="package_id" class="form-control select2">
                                            <option disabled selected>-- Choose --</option>
                                            @foreach ($packages as $item)
                                                <option value="{{ $item->id }}">{{ $item->package_name }} -
                                                    ${{ $item->package_price }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-primary">Pay with Paypal</button>
                                    </td>
                                </tr>
                            </form>

                            <form action="{{ route('company_stripe') }}" method="POST">
                                @csrf
                                <tr>
                                    <td>
                                        <select name="package_id" id="package_id" class="form-control select2">
                                            <option disabled selected>-- Choose --</option>
                                            @foreach ($packages as $item)
                                                <option value="{{ $item->id }}">{{ $item->package_name }} -
                                                    ${{ $item->package_price }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-primary">Pay with Stripe</button>
                                    </td>
                                </tr>
                            </form>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
