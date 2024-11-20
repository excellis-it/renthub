@extends('frontend.includes.master')

@section('content')
@include('frontend.includes.header')

<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css" rel="stylesheet">


@php
    use App\Helpers\Product;
@endphp


<section class="inner_banner_sec" style="
    background-image: url({{ asset('frontend_assets/assets/images/inr-bnr.jpg') }});
    background-position: center;
    background-repeat: no-repeat; 
    background-size: cover;
  ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="inner-banner-text">
                    <h1>User Dashboard</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="dash-board_wrapper dashboard_sec">
        <div class="container">
            <div class="row">

                <div class="col-lg-3">
                    @include('frontend.dashboard.sidebar')  
                </div>
                <div class="col-lg-9">
                    <div class="row g-3 mb-5">
                        <div class="col-xl-6 col-sm-6 col-12">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <a href="{{ Route('user-enquiry-product', 1) }}">
                                    <div class="row">
                                        <div class="col">
                                            <span
                                                class="h6 font-semibold text-muted text-sm d-block mb-2">Properties</span>
                                            <span class="h3 font-bold mb-0">{{ count(Product::product(Auth::user()->id)['properties']) ?? 0 }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-main text-white text-lg rounded-circle">
                                                <i class="fa-solid fa-home"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2 mb-0 text-sm">
                                       
                                        <span class="text-nowrap text-xs text-muted">Since last month</span>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-sm-6 col-12">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <a href="{{ Route('user-enquiry-machinery', 2) }}">
                                    <div class="row">
                                        <div class="col">
                                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">Equipments & Machinery</span>
                                            <span class="h3 font-bold mb-0">{{ count(Product::product(Auth::user()->id)['machineries']) ?? 00 }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                                <i class="fa-solid fa-screwdriver-wrench"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2 mb-0 text-sm">
                                        
                                        <span class="text-nowrap text-xs text-muted">Since last month</span>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-sm-6 col-12">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <a href="{{ Route('user-enquiry-vehicles', 4) }}">
                                    <div class="row">
                                        <div class="col">
                                            <span
                                                class="h6 font-semibold text-muted text-sm d-block mb-2">Vehicles</span>
                                            <span class="h3 font-bold mb-0">{{ count(Product::product(Auth::user()->id)['vehicles']) ?? 00 }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                                <i class="fa-solid fa-car"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2 mb-0 text-sm">
                                        
                                        <span class="text-nowrap text-xs text-muted">Since last month</span>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-sm-6 col-12">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <a href="{{ Route('user-enquiry-electronics',3) }}">
                                    <div class="row">
                                        <div class="col">
                                            <span
                                                class="h6 font-semibold text-muted text-sm d-block mb-2">Electronics</span>
                                            <span class="h3 font-bold mb-0">{{ count(Product::product(Auth::user()->id)['electronics']) ?? 00 }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                                <i class="fa-solid fa-camera"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2 mb-0 text-sm">
                                        
                                        <span class="text-nowrap text-xs text-muted">Since last month</span>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                    {{-- <div class="card shadow border-0 mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">Properties</h5>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-nowrap mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Image</th> 
                                        <th scope="col">Title</th>
                                        <th scope="col">Property description</th>
                                        <th scope="col">product Price</th>
                                        <th scope="col">market price</th>
                                        <th scope="col">Sq Ft</th>
                                        <!--<th></th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($user_property_enquries as $property_enqury)
                                    <tr>
                                        <td>{{ $property_enqury->product->product_name ?? '' }}</td>
                                        <td>{!!$property_enqury->product->product_short_description !!}</td>
                                        <td>${{$property_enqury->product->product_price ?? '' }}</td>
                                        <td>${{$property_enqury->product->marked_price ?? ''}}</td>
                                        
                                    </tr>

                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card shadow border-0 mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">Machinery</h5>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-nowrap mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Image</th> 
                                        <th scope="col">Title</th>
                                        <th scope="col">Property description</th>
                                        <th scope="col">product Price</th>
                                        <th scope="col">market price</th>
                                        <th scope="col">Sq Ft</th>
                                        <!--<th></th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($user_machinery_enquries as $property_enqury)
                                    <tr>
                                        <!--<td>-->
                                        <!--    <img alt="..." src="assets/images/feature_property.jpg"-->
                                        <!--        class="avatar avatar-xs rounded-circle me-2" width="30px"-->
                                        <!--        height="30px">-->
                                        <!--</td> -->
                                        <!--<td></td>-->
                                        <td>{{ $property_enqury->product->product_name ?? '' }}</td>
                                        <td>{!!$property_enqury->product->product_short_description !!}</td>
                                        <td>${{$property_enqury->product->product_price ?? '' }}</td>
                                        <td>${{$property_enqury->product->marked_price ?? ''}}</td>
                                        <!--<td class="text-end">-->
                                        <!--    <a href="#" class="view_icon">-->
                                        <!--        <i class="fa-solid fa-eye"></i>-->
                                        <!--    </a>-->
                                        <!--    <a href="#" class="delete_icon">-->
                                        <!--        <i class="fa-solid fa-trash"></i>-->
                                        <!--    </a>-->
                                        <!--</td>-->
                                    </tr>

                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    </div>
</section>


@include('frontend.includes.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox-plus-jquery.min.js"></script>
@endsection