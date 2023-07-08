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
                    <h2>Orders</h2>
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


                    <h4>Choose Plan and Make Payment</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">

                            <tr class="text-center">
                                <th>SL</th>
                                <th>Order No</th>
                                <th>Package Name</th>
                                <th>Price</th>
                                <th>Order Date</th>
                                <th>Expire Date</th>
                                <th>Payment Method</th>
                            </tr>

                            @foreach ($orders as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}. </td>
                                    <td>{{ $item->order_no }}</td>
                                    <td>
                                        {{ $item->rPackage->package_name }} &nbsp;

                                        @if ($item->currently_active == 1)
                                            <span class="badge bg-success">Active</span>
                                        @endif

                                    </td>
                                    <td>${{ $item->paid_amount }}</td>
                                    <td>{{ $item->start_date }}</td>
                                    <td>{{ $item->expire_date }}</td>
                                    <td class="text-center">{{ $item->payment_method }}</td>
                                </tr>
                            @endforeach


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
