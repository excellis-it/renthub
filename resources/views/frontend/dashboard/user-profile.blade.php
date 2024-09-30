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
                    <div class="card border-0 shadow py-4">
                        <div class="text-center">
                            <img src="{{ asset('frontend_assets/assets/images/logo.png') }}"
                                class="card-img-top rounded-circle w-50 shadow" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">

                                    <b>{{ $user->first_name }} {{ $user->last_name }}</b>
                                </h5>
                            </div>
                        </div>


                        <div class="list-group ">
                            <a href="{{ URL::to('/user/profile') }}"
                                class="list-group-item list-group-item-action active" aria-current="true">
                                <i class="fa-solid fa-home"></i> Dashboard
                            </a>
                            <a href="{{ Route('user-enquiry-product',1) }}"
                                class="list-group-item list-group-item-action" aria-current="true">
                                <i class="fa-solid fa-hotel"></i> Properties
                            </a>
                            <a href="{{ URL::to('/user/profile') }}"
                                class="list-group-item list-group-item-action" aria-current="true">
                                <i class="fa-solid fa-screwdriver-wrench"></i> Machineries
                            </a>
                            <a href="{{ URL::to('/user/profile') }}"
                                class="list-group-item list-group-item-action" aria-current="true">
                                <i class="fa-solid fa-camera"></i> Electronics
                            </a>
                            <a href="{{ URL::to('/user/profile') }}"
                                class="list-group-item list-group-item-action" aria-current="true">
                                <i class="fa-solid fa-car"></i> Vehicles
                            </a>
                            <a href="{{ url('/user/edit/' . $user->id) }}"
                                class="list-group-item list-group-item-action"> <i class="fa-solid fa-id-card-clip"></i>
                                Update Profile</a>
                            <a href="{{ url('/user/change-password/' . $user->id) }}"
                                class="list-group-item list-group-item-action"><i class="fa-solid fa-key"></i> Change
                                Password</a>
                            <a href="{{ URL::to('/user/payment-history') }}"
                                class="list-group-item list-group-item-action "> <i class="fa-solid fa-money-check"></i>
                                Payment History</a>
                            <a href="{{ URL::to('/user/subscription-history') }}"
                                class="list-group-item list-group-item-action"> <i class="fa-solid fa-money-bill"></i>
                                Subscription History</a>


                            <a href="{{ URL::to('/logout') }}" class="list-group-item list-group-item-action"> <i
                                    class="fa-solid fa-right-from-bracket" onclick="event.preventDefault(); this.closest
                                            ('form').submit();"></i>
                                Logout</a>

                        </div>

                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row g-3 mb-5">
                        <div class="col-xl-6 col-sm-6 col-12">
                            <div class="card shadow border-0">
                                <div class="card-body">
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
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-sm-6 col-12">
                            <div class="card shadow border-0">
                                <div class="card-body">
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
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-sm-6 col-12">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span
                                                class="h6 font-semibold text-muted text-sm d-block mb-2">Vehicles</span>
                                            <span class="h3 font-bold mb-0">00</span>
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
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-sm-6 col-12">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span
                                                class="h6 font-semibold text-muted text-sm d-block mb-2">Electronics</span>
                                            <span class="h3 font-bold mb-0">00</span>
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg_f7f7f7">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enquire Now</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="propety-type mb-div">
                    <div class="tour-form">
                        <form>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">First & last name</label>
                                        <input type="text" class="form-control" id="" value=""
                                            placeholder="First & last name" required="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Phone</label>
                                        <input type="text" class="form-control" id="" value="" placeholder="Phone"
                                            required="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" id="" value="" placeholder="Email"
                                            required="">
                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Message</label>
                                        <textarea class="form-control form-control-1" id="" placeholder="Message"
                                            rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Interested In</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Request a tour
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault2" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Apply
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault3" checked>
                                            <label class="form-check-label" for="flexRadioDefault3">
                                                Enquire
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Select a preferred date for tour
                                            <span>(optional)</span></label>
                                        <input type="date" class="form-control" id="" value="" placeholder="Email"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-12">
                                        <div class="request-btn text-center">
                                            <a href="#" class="">Inquire Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('frontend.includes.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox-plus-jquery.min.js"></script>
@endsection